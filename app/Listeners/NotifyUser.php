<?php

namespace App\Listeners;

use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyUser
{
   
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
       $users = User::get();

       foreach ($users as $user) {
        Mail::to($user->email)->send(new UserMail($event->post));
       }
    }
}
