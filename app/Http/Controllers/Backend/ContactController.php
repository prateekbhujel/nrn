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
        try {
            $post = $request->all();
            $queryDetail = Contact::where('id', $post['id'])->first();

            $data = [
                'queryDetail' => $queryDetail,
            ];

            $data['type'] = 'success';
            $data['message'] = 'Successfully fetched data of Event.';
        } catch (QueryException $e) {
            $data['type'] = 'error';
            $data['message'] = $this->queryMessage;
        } catch (Exception $e) {
            $data['type'] = 'error';
            $data['message'] = $e->getMessage();
        }
        return view('admin.contact.view', $data);
    }

    public function destroy($id)
    {
        $contact = Controller::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Contact deleted successfully.');
    }
}

