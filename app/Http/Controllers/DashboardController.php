<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Models\Subscription;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $testimonialCount = Testimonial::count();
        $contactCount = Contact::count();
        $subscriberCount = Subscription::count();
        $projectsCount = Project::count();

        return view('backend.dashboard.index', compact('testimonialCount', 'contactCount', 'subscriberCount', 'projectsCount'));
    }

    public function profile()
    {
        return view('backend.profile.index');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
        ]);

        $user = auth()->user();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password matches
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the user's password
        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
