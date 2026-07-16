<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $contacts = Contact::all();

        return view('Contact.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('Contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $contactVal = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'contact' => 'required|numeric|digits:9'
        ]);

        Contact::create($contactVal);

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //TODO SHOW (ID)
        $contact = Contact::findOrFail($id);

        return view('Contact.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //TODO EDIT (ID)
        $contact = Contact::findOrFail($id);

        return view('Contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //TODO UPDATE (request, id)
        $contact = Contact::findOrFail($id);

        $contactVal = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'contact' => 'required|numeric|digits:9'
        ]);

        $contact->update($contactVal);

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //TODO DESTROY (ID)
        Contact::findOrFail($id)->destroy($id);

        return redirect()->route('contact.index');
    }
}
