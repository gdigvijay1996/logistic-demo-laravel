<?php

namespace App\Mail;

use App\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestNewUser extends Mailable
{
    use Queueable, SerializesModels;

    public $name = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $users)
    {
        //
        $this->name = $users->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test_mail')->with(['name' => $this->name]);
    }
}
