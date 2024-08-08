<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $telephone;
    public $subject;
    public $message;

    public function __construct($name, $email, $telephone, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.enquiry_received')
                    ->subject('Thank You for Your Enquiry');
    }
}
