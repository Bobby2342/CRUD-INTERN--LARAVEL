<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\UserMail;
use App\Events\ProductCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redirect;

class NotifyUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated $event): void
    {
        $users = User::get();

        foreach ($users as $user) {
            if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($user->email)->send(new UserMail($event->product));
            } else {
                 redirect()->back()->withErrors(['error' => 'Invalid email address for user']);
            }
        }
}
};

