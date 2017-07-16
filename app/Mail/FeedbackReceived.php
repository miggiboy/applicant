<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Carbon\Carbon;

class FeedbackReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $senderName;
    public $senderMailOrPhone;
    public $feedbackBody;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->senderName = $request->sender_name;
        $this->senderMailOrPhone = $request->sender_mail_or_phone;
        $this->feedbackBody = $request->body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.feedback-received')
            ->subject(str_limit($this->feedbackBody, 50));
    }
}
