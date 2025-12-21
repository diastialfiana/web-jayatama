<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct(array $contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this->from('no-reply@jayatama.id', 'Jayatama Website')
                    ->subject('Pesan Kontak Baru - ' . $this->contactData['subject'])
                    ->view('emails.contact-form')
                    ->with([
                        'data' => $this->contactData
                    ]);
    }
}