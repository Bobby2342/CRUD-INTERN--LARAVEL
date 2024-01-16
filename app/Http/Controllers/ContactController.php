<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContact(){

        return view('ContactForm');
    }


    public function submitContact(Request $request)
    {
        // Retrieve data from the form
        $name = (string) $request->input('name');  //here ->input('name) is the form component like <form ..  name = " name " />
        $email = (string) $request->input('email');
        $phone = (string) $request->input('phone');
        $message = (string) $request->input('message');

            // Save form data to the database
            $contactMessage = new Contact();
            $contactMessage->name = $name;
            $contactMessage->email = $email;
            $contactMessage->phone = $phone;
            $contactMessage->messages = $message; //here ->name , ->email are the table columns of the database
            $contactMessage->save();

        // Send email with adjusted key 'messages'
        Mail::send('Contact', [ //mail.php is assigned here and following messages=>message is
            'name' => $name,    //done because we have given messages in table column so , messages => $message
            'email' => $email, //these are the 'email' are table column and => $email are the variable assigned
            'phone' => $phone,
            'messages' => $message, // Changed key from 'message' to 'messages'
        ], function ($mail) use ($email,$name) {
            $mail->from($email, $name); // Set the 'From' email and name
            $mail->to('bgoogly0@gmail.com')->subject('New Contact Message !!');
            $mail->replyTo($email, $name); // Set the 'Reply-To' email and name
        });

        return redirect()->back()->with('success', 'Message has been sent successfully!We will response back to you soon!');
    }
    }

