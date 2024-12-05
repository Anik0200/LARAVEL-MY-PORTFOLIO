<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('backend.profile');
    }

    public function profile_update(Request $request)
    {
        //Validation
        $request->validate(
            [
                'name'  => 'required|max:40',
                'email' => 'required|max:100',
            ]
        );

        //Get User
        $user = User::where('id', Auth::user()->id)->first();

        //Image Upload
        if ($request->file('image')) {

            //Delete Old Image
            if ($user->image != null && File::exists(public_path('images/' . $user->image))) {
                unlink(public_path('images/' . $user->image));
            }

            //Upload New Image
            $image     = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);

        } else {
            $imageName = $user->image;
        }

        // Update
        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'phone'    => $request->phone,
            'image'    => $imageName,
        ]);

        return redirect()->route('dashboard.profile')->with('success', 'Profile Updated');
    }
}
