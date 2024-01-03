<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function loginView(){

        return view('Login');
    }
    public function submitLogin(Request $request){

        $request->validate([

            'email' => 'required',
            'password' => 'required',]);

            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)){

                return redirect()->intended('/')->withSuccess('Signed In');


            }




        return redirect('/login')->withSuccess('Login details are not valid');

    }


    public function signupView(){



        return view('signup');
    }
    public function submitSignup(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect('/login')->with('success', 'User signed up successfully');
    }
    public function logout(){

        Session::flush();
        Auth::logout();
        return redirect('login');
    }

}
