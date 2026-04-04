<?php

namespace App\Mail;

use App\Models\User;
use App\Models\ViolationRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentChargeNoticeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public ViolationRecord $record,
        public User $student,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Formal Notice of Charge — CSU SCMS Case #'.$this->record->case_tracking_number,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.student.charge-notice',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
