<?php

namespace App\Observers;

use App\Mail\TestNewUser;
use App\Users;
use Illuminate\Support\Facades\Mail;

class NewUserObserver
{
    //
    public function creating(Users $user)
    {
        //
    }

    public function created(Users $user)
    {
        //
    }

    public function updating(Users $user)
    {
        //
    }

    public function  updated(Users $user)
    {
        //
    }

    public function saving(Users $user)
    {
        //
        $user->referance_code = $this->randomString();
    }

    // get random string function
    public static function randomString($length = 6)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function saved(Users $user)
    {
        //
    }

    public function deleting(Users $user)
    {
        //
        Mail::to('digvijay@logisticinfotech.co.in')->send(new TestNewUser($user));
    }

    public function deleted(Users $user)
    {
        //
    }

    public function restoring(Users $user)
    {
        //
    }

    public function restored(Users $user)
    {
        //
    }
}
