<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('backend.contact.list', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function activate($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 1; // Set status to active
        $contact->save();

        return redirect()->route('projects.list')->with('success', 'Project activated successfully.');
    }

    public function deactivate($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 0; // Set status to inactive
        $contact->save();

        return redirect()->route('projects.list')->with('success', 'Project deactivated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['success' => 'Contact deleted successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'company' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'product_design' => 'required|string|max:255',
            'project_description' => 'required|string',
        ]);

        // Create a new Contact record in the database
        Contact::create($validatedData);

        // Return a JSON response to the AJAX request
        return response()->json(['success' => 'Your message has been sent successfully.']);
    }
}
