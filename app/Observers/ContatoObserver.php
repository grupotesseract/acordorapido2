<?php

namespace App\Observers;

use Mail;
use App\Models\Contato;
use App\Mail\NovoContato;

class ContatoObserver
{
    /**
     * Listen to the Contato created event.
     *
     * @param  Contato  $contato
     * @return void
     */
    public function created(Contato $contato)
    {
        Mail::send(new NovoContato($contato));
    }
}
