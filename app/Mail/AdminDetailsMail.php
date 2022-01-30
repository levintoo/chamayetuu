<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class AdminDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email ,$name ,$password)
    {
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('chamayetu@co.ke', Auth::user()->name)
            ->subject('Chamayetu Admin Password')
            ->markdown('mails.AdminDetailsMail')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
            ]);
    }
}
