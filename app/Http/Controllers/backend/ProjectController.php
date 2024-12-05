<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Project Table
    public function index()
    {
        $projects = Project::paginate(10);
        return view('backend.project.index', compact('projects'));
    }

    // Create Project
    public function create()
    {
        return view('backend.project.create');
    }

    // Store Project
    public function store(Request $request)
    {
        // Validation
        $request->validate(
            [
                'title'     => 'required|max:50',
                'thumbnail' => 'required|mimes:png,jpg,jpeg',
                'images.*'  => 'mimes:png,jpg,jpeg',

            ],
            [
                'title.required'     => 'Title Is Required',
                'title.max'          => 'Title Max 50 Character',
                'thumbnail.mimes'    => 'Thumbnail Must be PNG,JPG or JPEG',
                'thumbnail.required' => 'Thumbnail Is Required',
                'images.mimes'       => 'Images Must be PNG,JPG or JPEG',
            ]
        );

        // Upload Thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail     = $request->file('thumbnail');
            $thumbnailName = Str::uuid() . '-' . 'thumbnail' . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('projectImages/'), $thumbnailName);
        }

        // Store Project
        $project = Project::create([
            'title'       => $request->title,
            'description' => $request->description,
            'technology'  => $request->technology,
            'source_code' => $request->source_code,
            'demo'        => $request->demo,
            'thumbnail'   => $thumbnailName,
        ]);

        // Upload Images
        $mainImages = $request->file('images');

        if ($mainImages !== null && $project) {
            foreach ($mainImages as $image) {
                $imageName = Str::uuid() . '-' . 'main' . '.' . $image->extension();
                $image->move(public_path('projectImages/'), $imageName);

                ProjectGallery::create([
                    'project_id' => $project->id,
                    'image'      => $imageName,
                ]);
            }
        }

        //Redirect
        if ($project) {
            return redirect()->route('dashboard.project.index')->with('success', 'Project Created Successfully');
        } else {
            return back()->with('error', 'Project Not Created');
        }
    }

    // Edit Project
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        // Find The Data
        $project = Project::with('projectGalleries')->findOrFail($id);

        // Validation
        $request->validate(
            [
                'title'     => 'required|max:50',
                'thumbnail' => 'mimes:png,jpg,jpeg',
                'images.*'  => 'mimes:png,jpg,jpeg',

            ],
            [
                'title.required'  => 'Title Is Required',
                'title.max'       => 'Title Max 50 Character',
                'thumbnail.mimes' => 'Thumbnail Must be PNG,JPG or JPEG',
                'images.mimes'    => 'Images Must be PNG,JPG or JPEG',
            ]
        );

        // Upload Thumbnail
        if ($request->hasFile('thumbnail')) {
            //Delete Old Image
            if ($project->thumbnail != null && File::exists(public_path('projectImages/' . $project->thumbnail))) {
                unlink(public_path('projectImages/' . $project->thumbnail));
            }

            //Upload New Image
            $thumbnail     = $request->file('thumbnail');
            $thumbnailName = Str::uuid() . '-' . 'thumbnail' . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('projectImages/'), $thumbnailName);
        } else {
            //Store Old Image
            $thumbnailName = $project->thumbnail;
        }

        // Store Project
        $project->update([
            'title'       => $request->title,
            'description' => $request->description,
            'technology'  => $request->technology,
            'source_code' => $request->source_code,
            'demo'        => $request->demo,
            'thumbnail'   => $thumbnailName,
        ]);

        // Upload More Images
        $mainImages = $request->file('images');

        if ($mainImages !== null && $project) {
            foreach ($mainImages as $image) {
                $imageName = Str::uuid() . '-' . 'main' . '.' . $image->extension();
                $image->move(public_path('projectImages/'), $imageName);

                ProjectGallery::create([
                    'project_id' => $project->id,
                    'image'      => $imageName,
                ]);
            }
        }

        //Redirect
        if ($project) {
            return redirect()->route('dashboard.project.index')->with('success', 'Project Updated Successfully');
        } else {
            return back()->with('error', 'Project Not Created');
        }
    }

    // Delete Project Gallery Images
    public function projectGalleryDlt($id)
    {
        $projectGallery = ProjectGallery::findOrFail($id);

        if ($projectGallery->image !== null && File::exists(public_path('projectImages/' . $projectGallery->image))) {
            unlink(public_path('projectImages/' . $projectGallery->image));
        }

        $projectGallery->delete();
        return back()->with('success', 'Deleted Image!');
    }

    public function destroy($id)
    {
        $project = Project::with('projectGalleries')->findOrFail($id);

        // Delete Project Gallery Images
        foreach ($project->projectGalleries as $projectGallery) {

            if ($projectGallery->image !== null && File::exists(public_path('projectImages/' . $projectGallery->image))) {
                unlink(public_path('projectImages/' . $projectGallery->image));
            }
            $projectGallery->delete();
        }

        // Delete Project Thumbnail
        if ($project->thumbnail != null && File::exists(public_path('projectImages/' . $project->thumbnail))) {
            unlink(public_path('projectImages/' . $project->thumbnail));
        }

        $project->delete();
        return back()->with('success', 'Projecte Deleted!');
    }

    public function projectActive($id)
    {
        $project = Project::findOrFail($id);
        $project->update(['status' => 'active']);
        return back()->with('success', 'Projecte Active!');
    }

    public function projectInactive($id)
    {
        $project = Project::findOrFail($id);
        $project->update(['status' => 'inactive']);
        return back()->with('success', 'Projecte Inactive!');
    }

    public function show($id)
    {
        $project = Project::with('projectGalleries')->findOrFail($id);
        return view('backend.project.show', compact('project'));
    }
}
