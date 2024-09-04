<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function case()
    {
        // $testimonials = Testimonial::latest()->take(5)->get();
        // $projects = Project::where('status', 1)->latest()->take(5)->get();
        // return view('frontend.homepage.index', compact('testimonials','projects'));
    }
    public function index()
    {
        $projects = Project::all();
        return view('backend.projects.list', compact('projects'));
    }
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    public function add()
    {
        $project = new Project();
        return view('backend.projects.add', compact('project'));
    }
    public function view($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('frontend.projects.project', compact('project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'stack' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        // Generate initial slug
        $slug = Str::slug($request->input('title'));

        // Check if slug exists and append a number if necessary
        $count = Project::where('slug', 'like', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $data = $request->only(['title', 'category', 'client', 'industry', 'stack', 'message']);
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('projects.list')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('backend.projects.add', compact('project'));
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'stack' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Generate slug from title
        $slug = Str::slug($request->input('title'));

        // Check if the slug is different from the current project's slug
        if ($project->slug !== $slug) {
            // Ensure the new slug is unique
            $count = Project::where('slug', 'like', "{$slug}%")->where('id', '!=', $project->id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $data['slug'] = $slug;
        }

        // Prepare the rest of the data array
        $data = $request->only(['title', 'category', 'client', 'industry', 'stack', 'message']);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            if ($project->image) {
                \Storage::delete('public/' . $project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        // Update the project
        $project->update($data);

        return redirect()->route('projects.list')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            \Storage::delete('public/' . $project->image);
        }

        $project->delete();

        return redirect()->route('projects.list')->with('success', 'Project deleted successfully.');
    }

    public function activate($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 1; // Set status to active
        $project->save();

        return redirect()->route('projects.list')->with('success', 'Project activated successfully.');
    }

    public function deactivate($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 0; // Set status to inactive
        $project->save();

        return redirect()->route('projects.list')->with('success', 'Project deactivated successfully.');
    }
}
