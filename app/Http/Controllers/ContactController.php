<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();

        return view('admincp.contacts.index', compact('contacts'));
    }

    public function edit(Contact $contact)
    {
        $contacts = Contact::all();

        return view('admincp.contacts.edit', compact('contacts', 'contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->back();
    }
}
