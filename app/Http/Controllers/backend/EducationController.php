<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::paginate(10);
        return view('backend.education.index', compact('educations'));
    }

    public function show($id)
    {
        $education = Education::findOrFail($id);
        return view('backend.education.show', compact('education'));
    }

    public function create()
    {
        return view('backend.education.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'deegre'     => 'required|max:40',
                'institute'  => 'required|max:40',
                'text'       => 'required|max:100',
                'end_year'   => 'required',
                'start_year' => 'required',
            ],
            [
                'deegre.required'     => 'Degree Is Required',
                'deegre.max'          => 'Degree Max 40 Character',
                'institute.required'  => 'Institute Is Required',
                'institute.max'       => 'Institute Max 40 Character',
                'text.required'       => 'Text Is Required',
                'text.max'            => 'Text Max 100 Character',
                'end_year.required'   => 'End Year Is Required',
                'start_year.required' => 'Start Year Is Required',
            ]
        );

        $done = Education::create($request->all());

        if ($done) {
            return redirect()->route('dashboard.education.index')->with('success', 'New Education Added!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('backend.education.edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'deegre'     => 'required|max:40',
                'institute'  => 'required|max:40',
                'text'       => 'required|max:100',
                'end_year'   => 'required',
                'start_year' => 'required',
            ],
            [
                'deegre.required'     => 'Degree Is Required',
                'deegre.max'          => 'Degree Max 40 Character',
                'institute.required'  => 'Institute Is Required',
                'institute.max'       => 'Institute Max 40 Character',
                'text.required'       => 'Text Is Required',
                'text.max'            => 'Text Max 100 Character',
                'end_year.required'   => 'End Year Is Required',
                'start_year.required' => 'Start Year Is Required',
            ]
        );

        $done = Education::findOrFail($id)->update($request->all());

        if ($done) {
            return redirect()->route('dashboard.education.index')->with('success', 'Education Updated!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $done = Education::findOrFail($id)->delete();

        if ($done) {
            return redirect()->route('dashboard.education.index')->with('success', 'Education Deleted!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
