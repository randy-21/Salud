<?php

namespace App\Mail;

use App\Models\Registry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistryCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $registry;

    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    public function build()
    {
        return $this->subject('REGISTRO DE CITA  - SEGUIMIENTO DE GESTANTE')
                    ->view('emails.registry_created')
                    ->with(['registry' => $this->registry]);
    }
}
