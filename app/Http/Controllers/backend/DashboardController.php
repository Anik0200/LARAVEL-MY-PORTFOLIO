<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        $services   = Service::all();
        $projects   = Project::all();
        $skills     = Skill::all();
        $educations = Education::all();

        return view('backend.dashboard', compact('services', 'projects', 'skills', 'educations'));
    }
}
