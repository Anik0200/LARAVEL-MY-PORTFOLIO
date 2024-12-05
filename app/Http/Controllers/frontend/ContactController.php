<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request)
    {

        $data            = [];
        $data['name']    = $request->name;
        $data['email']   = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;

        Mail::to('mdabdollahradianik@gmail.com')->send((new ContactMail($data)));

        return back()->with('success', 'Mail Sent!');
    }
}
