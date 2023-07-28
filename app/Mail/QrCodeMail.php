<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QrCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $barcode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $barcode)
    {
        $this->user = $user;
        $this->barcode = $barcode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Qr Code Absensi Yoga')
            ->view('emails.qr');
    }
}
