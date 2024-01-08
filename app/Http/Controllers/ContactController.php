<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContact(){

        return view('Contact');
    }


    public function submitContact(Request $request){

        //retrieve data from blade file
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');

        //send email
        Mail::send('emails.contact',[

            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'message'=>$message,

        ], function($mail)use($email){
            $mail->from($email);
            $mail->to('bgoogly0@gmail.com')->subject('New Contact Message !!');


        });

        return redirect()->back()->with('success', 'Message has been sent successfully !');






    }
}
