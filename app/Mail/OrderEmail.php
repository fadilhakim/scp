<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        //
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('alhusna901@gmail.com')
                    ->view('invoice.invoice-fancy-page-inline')
                    //->text('mails.demo_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ]);
    }
}
