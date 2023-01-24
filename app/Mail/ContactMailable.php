<?php

namespace App\Mail;

use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public string $email;
    public string $nombre;
    public string $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $datos)
    {
        $this->nombre=$datos['nombre'];
        $this->email=$datos['email'];
        $this->mensaje=$datos['mensaje'];
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->email, $this->nombre),
            subject: 'Formulario de Contacto',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mails.contact',
            with:[
                'nombre'=>$this->nombre,
                'email'=>$this->email,
                'mensaje'=>$this->mensaje
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
