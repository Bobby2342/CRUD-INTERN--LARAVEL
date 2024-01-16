<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function viewProfile(){

    return view('Profile');
  }


  public function createProfile(Request $request){



    $validatedData = $request->validate([
        'image' => 'required|image|max:2048', // Adjust validation rules for the image
        'gender' => 'required', // Add validation rules for gender
        'location' => 'required', // Add validation rules for location
    ]);

         $profile = new Profile();
         $profile->image = $request->file('image')->store('images');
         $profile->gender = $request->input('gender');
         $profile->location = $request->input('location');
         $profile->save();



         return redirect()->back()->with('success', 'Profile created successfully!');
        }

        public function fetchProfile(){

            $profile = Profile::all();

            return view('Profile', ['profile', $profile]);
        }
}
