<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\Mail\MailNovaSerie;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovaSerieCadastrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $nomeSerie = $event->nomeSerie;
        $qtdTemporadas = $event->qtdTemporadas;
        $qtdEpisodios = $event->qtdEpisodios;

        $users = User::all();

        foreach ($users as $indice => $user) {
            $i = $indice + 1;
            $email = new MailNovaSerie($nomeSerie, $qtdTemporadas, $qtdEpisodios);
            $email->subject = 'Nova Serie Adicionada';
            Mail::to($user)->later(now()->addSeconds($i * 6), $email);
        }
        
    }
}
