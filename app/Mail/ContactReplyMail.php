<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Contact $contact,
        public string $replySubject,
        public string $replyMessage
    ) {
    }

    public function build(): self
    {
        return $this
            ->subject($this->replySubject)
            ->view('emails.contact-reply');
    }
}
