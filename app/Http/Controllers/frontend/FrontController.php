<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experiance;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;

class FrontController extends Controller
{
    public function index()
    {
        $services    = Service::all();
        $projects    = Project::latest()->limit(3)->get();
        $skills      = Skill::latest()->get();
        $educations  = Education::latest()->get();
        $experiances = Experiance::latest()->get();

        return view('frontend.index', compact('services', 'projects', 'skills', 'educations', 'experiances'));
    }
}
