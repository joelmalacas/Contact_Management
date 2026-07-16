<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    
    const minLength = 5;
    const digits = 9;
    const max = 150;

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
        //TODO TRATAMENTO PARAM
        $contactVal = $request->validate([
            'name' => 'required|string|regex:/^[\pL\s]+$/u|min:' . self::minLength,
            'email' => 'required|email|max:' . self::max,
            'contact' => 'required|numeric|digits:' . self::digits,
        ], [
            'name.required' => 'Name is required',
            'name.regex' => 'Name must not contain numbers.',
            'name.min' => 'The name need to have at least ' . self::minLength  . ' characters',
            'email.required' => 'Email required',
            'email.email' => 'E-mail not valid',
            'email.unique' => 'Email already exists',
            'email.max' => 'Email is too long',
            'contact.required' => 'Contact is required',
            'contact.numeric' => 'Contact must be a number',
            'contact.digits' => 'Contact must be ' . self::digits  . ' digits'
        ]);

        try {
            Contact::create($contactVal);

            return redirect()
                ->route('contact.index')
                ->with('success', 'Contact has been created successfully');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
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

        //TODO TRATAMENTO PARAM
        $contactVal = $request->validate([
            'name' => 'required|string|regex:/^[\pL\s]+$/u|min:' . self::minLength,
            'email' => 'required|email|max:' . self::max,
            'contact' => 'required|numeric|digits:' . self::digits,
        ], [
            'name.required' => 'Name is required',
            'name.regex' => 'Name must not contain numbers.',
            'name.min' => 'The name need to have at least ' . self::minLength  . ' characters',
            'email.required' => 'Email required',
            'email.email' => 'E-mail not valid',
            'email.unique' => 'Email already exists',
            'email.max' => 'Email is too long',
            'contact.required' => 'Contact is required',
            'contact.numeric' => 'Contact must be a number',
            'contact.digits' => 'Contact must be ' . self::digits  . ' digits'
        ]);

        try {
            $contact->update($contactVal);

            return redirect()
                ->route('contact.index')
                ->withInput()
                ->with('success', 'Contact has been updated successfully');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
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
