<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class IntentionMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $studentName;
    public $studentNumber;
    
    /**
     * Create a new message instance.
     * @param string $studentName
     * @return void
     */
    public function __construct($studentName, $studentNumber)
    {
        $this->studentName = $studentName;
        $this->studentNumber = $studentNumber;
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notice of Intention Notification')
                    ->view('emails.intention')
                    ->with([
                        'studentName' => $this->studentName,
                        'studentNumber' => $this->studentNumber
                    ]);
    }
}