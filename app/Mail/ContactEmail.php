<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
//    public $title;
//    public $body;
    public $data;

    public function __construct($title,$body)
    {
        $this->data = [
            'title'=>$title,
            'body'=>$body,
        ];
//        $this->title = $title;
//        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-email')->subject('عقارات')
            ->from('admin@aqarat.com');
    }
}
