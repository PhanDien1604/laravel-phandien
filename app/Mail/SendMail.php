<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $email_address;
    private $data;

    public function __construct($email_address, $data)
    {
        $this->email_address = $email_address;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = $this->data;
        return $this->from('dienpq1604@gmail.com')
            ->to($this->email_address)
            ->view('content', compact('content'));
    }
}
