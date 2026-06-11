<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\DataTables\ContactDataTable;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Helper\MailHelper;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function index(ContactDataTable $dataTable)
    {
        return $dataTable->render('admin.contact.index');
    }

    public function view(Request $request)
    {
        $contactId = $request->input('id');
        $contact = Contact::findOrFail($contactId);
        $html = view('admin.contact.partials.view', compact('contact'))->render();
        return response()->json(['html' => $html]);
    }

    public function reply(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'reply_subject' => ['required', 'string', 'max:255'],
            'reply_message' => ['required', 'string'],
        ]);

        if (blank($contact->email_address)) {
            return redirect()->route('admin.contact')->with('error', 'This contact has no email address.');
        }

        try {
            MailHelper::setMailConfig();

            Mail::to($contact->email_address, $contact->full_name)
                ->send(new ContactReplyMail($contact, $data['reply_subject'], $data['reply_message']));
        } catch (Throwable $exception) {
            report($exception);

            return redirect()
                ->route('admin.contact')
                ->with('error', 'Reply could not be sent. Check SMTP settings.');
        }

        $contact->update([
            'reply_subject' => $data['reply_subject'],
            'reply_message' => $data['reply_message'],
            'replied_at' => now(),
            'replied_by' => auth()->id(),
        ]);

        return redirect()->route('admin.contact')->with('success', 'Reply sent successfully.');
    }
    
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }
}
