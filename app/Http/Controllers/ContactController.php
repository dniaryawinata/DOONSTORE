<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contact', compact('contacts'));
    }
    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            // Validate the request data
            $request->validate([
                'name' => 'required|max:255',
                'subject' => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|max:255',
                'message' => 'required|max:1000',
            ]);
            // Create a new contact
            Contact::create($request->all());

            return redirect()->route('home')->with('success', 'Contact created successfully.');
        } catch (ValidationException $e) {
            dd($e);
            return redirect()->route('home')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('home')->with('error', 'Failed to create Contact.')->withInput();
        }
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        try {
            $request->validate([
                'name' => 'required',
                'subject' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ]);


            $contact->update($request->all());

            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->route('contacts.edit', $contact->id)->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->route('contacts.edit', $contact->id)->with('error', 'Failed to update Contact.')->withInput();
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();

            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'Failed to delete Contact.');
        }
    }
}