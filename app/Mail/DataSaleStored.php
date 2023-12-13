<?php

namespace App\Mail;

use App\Enums\Tools;
use App\Models\Experiential;
use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DataSaleStored extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Sale $sale)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('academic@coachteen.com', 'Student Services'),
            subject: 'Test Completed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $experiential = Experiential::where('session', $this->sale->session)->first();

        $tool = match($experiential->tool){
            'eid' => Tools::EID->value,
            'ipv' => Tools::IPV->value,
        };
        return new Content(
            view: 'emails.sales-completed',
            with: [
                'applicant_name'    => $experiential->user->name,
                'applicant_email'   => $experiential->user->email,
                'session'           => $this->sale->session,
                'tool'              => $tool
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
