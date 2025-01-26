<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Post; // Make sure to include the Post model

class PostNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $post; // Add public property to hold the post object

    /**
     * Create a new message instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post; // Assign post data to the property
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Post Created',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email',  // This is the Blade view for the email
            with: ['post' => $this->post]  // Pass the post data to the view
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
