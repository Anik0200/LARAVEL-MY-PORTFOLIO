<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Service Table
    public function index()
    {
        $services = Service::paginate(10);
        return view('backend.service.index', compact('services'));
    }

    // Create Service
    public function create()
    {
        return view('backend.service.create');
    }

    // Store Service
    public function store(Request $request)
    {
        // Validation
        $request->validate(
            [
                'icon'        => 'required',
                'title'       => 'required|max:20',
                'description' => 'required|max:120',
            ],
            [
                'icon.required'        => 'Icon Is Required',
                'title.required'       => 'Title Is Required',
                'description.required' => 'Description Is Required',
                'title.max'            => 'Title Max 20 Character',
                'description.max'      => 'Description Max 120 Character',
            ]
        );

        // Create Service
        $service = Service::create([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => strip_tags($request->description),
        ]);

        // Redirect
        if ($service) {
            return redirect()->route('dashboard.service.index')->with('success', 'Service Created');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    // Edit Service
    public function edit($id)
    {
        $service = Service::where('id', $id)->first();
        return view('backend.service.edit', compact('service'));
    }

    // Update Service
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate(
            [
                'icon'        => 'required',
                'title'       => 'required|max:20',
                'description' => 'required|max:120',
            ],
            [
                'icon.required'        => 'Icon Is Required',
                'title.required'       => 'Title Is Required',
                'description.required' => 'Description Is Required',
                'title.max'            => 'Title Max 20 Character',
                'description.max'      => 'Description Max 120 Character',
            ]
        );

        // Update Service
        $service = Service::findOrFail($id)->update([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => strip_tags($request->description),
        ]);

        // Redirect
        if ($service) {
            return redirect()->route('dashboard.service.index')->with('success', 'Service Updated');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.show', compact('service'));
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('dashboard.service.index')->with('success', 'Service Deleted');
    }
}
