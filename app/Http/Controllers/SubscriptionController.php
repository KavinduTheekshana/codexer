<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('backend.subscriptions.list', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        // Store the email in the database
        Subscription::create([
            'email' => $request->email,
        ]);

        // Return a success response
        return response()->json(['message' => 'Thank you for subscribing!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the subscription by ID
        $subscription = Subscription::findOrFail($id);
        // Delete the subscription
        $subscription->delete();
        // Redirect back with a success message
        return redirect()->route('subscriptions.list')->with('success', 'Subscription deleted successfully.');
    }
}
