<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // Create Banner
    public function index()
    {
        $banner = Banner::first();
        return view('backend.banner.index', compact('banner'));
    }

    // Store Banner
    public function store(Request $request)
    {
        // Validation
        $request->validate(
            [
                'title'   => 'required|max:20',
                'text'    => 'required|max:100',
                'btn_url' => 'required',
            ],
            [
                'title.required'   => 'Title Is Required',
                'text.required'    => 'Text Is Required',
                'btn_url.required' => 'Url Is Required',
                'title.max'        => 'Title Max 20 Character',
                'text.max'         => 'Text Max 110 Character',
            ]
        );

        // // Create Banner
        $banner = Banner::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'title'   => $request->title,
                'text'    => strip_tags($request->text),
                'btn_url' => $request->btn_url,
            ]
        );

        // Redirect
        if ($banner) {
            return back()->with('success', 'Banner updated');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
