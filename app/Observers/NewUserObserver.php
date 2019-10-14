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
        echo 'creating calls';
        // exit;
    }

    public function created(Users $user)
    {
        //
        echo 'created calls';
        // exit;
    }

    public function updating(Users $user)
    {
        //
        echo 'updating calls';
        // exit;
    }

    public function  updated(Users $user)
    {
        //
        echo 'updated calls';
        // exit;
    }

    public function saving(Users $user)
    {
        //
        echo 'saving calls';
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
        echo 'saved calls';
        // exit;
    }

    public function deleting(Users $user)
    {
        //
        Mail::to('digvijay@logisticinfotech.co.in')->send(new TestNewUser($user));
    }

    public function deleted(Users $user)
    {
        //
        echo 'deleted calls';
        // exit;
    }

    public function restoring(Users $user)
    {
        //
        echo 'restoring calls';
        // exit;
    }

    public function restored(Users $user)
    {
        //
        echo 'restored calls';
        // exit;
    }
}
