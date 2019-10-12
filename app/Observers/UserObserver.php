<?php

namespace App\Observers;

use App\Mail\TestMail;
use App\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function creating(User $user)
    {
        //
    }

    public function created(User $user)
    {
        //
    }

    public function updating(User $user)
    {
        //
    }

    public function  updated(User $user)
    {
        //
    }

    public function saving(User $user)
    {
        //
    }

    public function saved(User $user)
    {
        //
    }

    public function deleting(User $user)
    {
        //
        Mail::to('digvijay@logisticinfotech.co.in')->send(new TestMail($user));
    }

    public function deleted(User $user)
    {
        //
    }

    public function restoring(User $user)
    {
        //
    }

    public function restored(User $user)
    {
        //
    }
}
