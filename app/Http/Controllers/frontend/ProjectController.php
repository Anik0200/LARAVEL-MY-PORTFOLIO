<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 'active')->with('projectGalleries')->latest()->get();
        return view('frontend.projects', compact('projects'));
    }

    public function details($id)
    {
        $project = Project::with('projectGalleries')->findOrFail($id);
        return view('frontend.projectDetails', compact('project'));
    }
}
