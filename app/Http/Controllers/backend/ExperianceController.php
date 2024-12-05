<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Experiance;
use Illuminate\Http\Request;

class ExperianceController extends Controller
{
    public function index()
    {
        $experiances = Experiance::paginate(10);
        return view('backend.experiance.index', compact('experiances'));
    }

    public function show($id)
    {
        $experiance = Experiance::findOrFail($id);
        return view('backend.experiance.show', compact('experiance'));
    }

    public function create()
    {
        return view('backend.experiance.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'position'   => 'required|max:40',
                'institute'  => 'required|max:40',
                'text'       => 'required|max:100',
                'end_year'   => 'required',
                'start_year' => 'required',
            ],
            [
                'deegre.required'     => 'Position Is Required',
                'deegre.max'          => 'Position Max 40 Character',
                'institute.required'  => 'Institute Is Required',
                'institute.max'       => 'Institute Max 40 Character',
                'text.required'       => 'Text Is Required',
                'text.max'            => 'Text Max 100 Character',
                'end_year.required'   => 'End Year Is Required',
                'start_year.required' => 'Start Year Is Required',
            ]
        );

        $done = Experiance::create($request->all());

        if ($done) {
            return redirect()->route('dashboard.experiance.index')->with('success', 'New Experiance Added!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $experience = Experiance::findOrFail($id);
        return view('backend.experiance.edit', compact('experience'));
    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'position'   => 'required|max:40',
                'institute'  => 'required|max:40',
                'text'       => 'required|max:100',
                'end_year'   => 'required',
                'start_year' => 'required',
            ],
            [
                'deegre.required'     => 'Position Is Required',
                'deegre.max'          => 'Position Max 40 Character',
                'institute.required'  => 'Institute Is Required',
                'institute.max'       => 'Institute Max 40 Character',
                'text.required'       => 'Text Is Required',
                'text.max'            => 'Text Max 100 Character',
                'end_year.required'   => 'End Year Is Required',
                'start_year.required' => 'Start Year Is Required',
            ]
        );

        $done = Experiance::findOrFail($id)->update($request->all());

        if ($done) {
            return redirect()->route('dashboard.experiance.index')->with('success', 'Experiance Updated!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $experiances = Experiance::findOrFail($id)->delete();

        if ($experiances) {
            return redirect()->route('dashboard.experiance.index')->with('success', 'Experiance Deleted!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

}
