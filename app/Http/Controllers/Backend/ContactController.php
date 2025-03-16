<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\DataTables\ContactDataTable;
use Illuminate\Http\Request;
use App\Models\Contact;

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
    
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }
}

