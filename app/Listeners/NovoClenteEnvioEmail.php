<?php

namespace App\Listeners;

use App\Events\NovoCliente;
use App\Mail\Transacional\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NovoClenteEnvioEmail
{
    /**
     * Create the event listener.
     */
    public function __construct(){}

    /**
     * Passa o Evento no metodo handle o Laravel registrará esses
     * métodos como ouvintes de eventos para o evento que é tipado na assinatura do método.
     */
    public function handle(NovoCliente $event): void
    {
        Mail::to($event->user->email)
        ->send(new WelcomeMail($event->user));
    }
}
