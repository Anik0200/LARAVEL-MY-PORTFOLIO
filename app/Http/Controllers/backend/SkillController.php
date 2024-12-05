<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate(10);
        return view('backend.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('backend.skill.craete');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:30',
            ],
            [
                'title.required' => 'Enter Skill Title',
                'title.max'      => 'Max 30 Character',
            ]
        );

        $done = Skill::create([
            'title' => Str::upper($request->title),
        ]);

        if ($done) {
            return redirect()->route('dashboard.skill.index')->with('success', 'New Skill Added!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('backend.skill.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $request->validate(
            [
                'title' => 'required|max:30',
            ],
            [
                'title.required' => 'Enter Skill Title',
                'title.max'      => 'Max 30 Character',
            ]
        );

        $done = $skill->update([
            'title' => Str::upper($request->title),
        ]);

        if ($done) {
            return redirect()->route('dashboard.skill.index')->with('success', 'Skill Updated!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $done = Skill::findOrFail($id)->delete();
        if ($done) {
            return redirect()->route('dashboard.skill.index')->with('success', 'Skill Deleted!');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
