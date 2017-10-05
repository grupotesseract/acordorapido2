<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Mail;

use App\Models\Contato;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoContato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * contato.
     *
     * @var mixed
     */
    public $contato;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contato $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(env('EMAIL_DESTINO_CONTATO'))
            ->from('contato@acordorapido.net.br')
            ->subject('[ACORDORAPIDO] Contato pelo formulário do site!')
            ->view('emails.contato');
    }
}
