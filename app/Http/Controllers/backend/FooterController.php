<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    // Create Footer
    public function index()
    {
        $footer = Footer::first();
        return view('backend.footer.index', compact('footer'));
    }

    // Store Footer
    public function store(Request $request)
    {
        // Validation
        $request->validate(
            [
                'text' => 'required|max:100',
            ],
            [
                'text.required' => 'Text Is Required',
                'text.max'      => 'Text Max 100 Character',
            ]
        );

        // Create Footer
        $footer = Footer::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'text'         => $request->text,
                'github_url'   => $request->github_url,
                'whatsapp_url' => $request->whatsapp_url,
                'twitter_url'  => $request->twitter_url,
            ]
        );

        // Redirect
        if ($footer) {
            return back()->with('success', 'Footer updated');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
