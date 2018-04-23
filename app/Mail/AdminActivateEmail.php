<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminActivateEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $activate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activate)
    {
        //
        $this->activate = $activate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('devhouseid99@gmail.com')
        ->subject("Activativate this email for access Admin")
        ->view('mails.AdminActivation');
        //->text('mails.demo_plain')
        /*->with(
          [
                'testVarOne' => '1',
                'testVarTwo' => '2',
          ]);*/
    }
}
