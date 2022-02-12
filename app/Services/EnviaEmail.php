<?php

namespace App\Services;

use App\Mail\MailNovaSerie;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EnviaEmail
{
    public function enviarEmail($nome, $qtd_temporada, $qtd_episodio): void
    {
        $users = User::all();

        foreach ($users as $indice => $user) {
            $i = $indice + 1;
            $email = new MailNovaSerie($nome, $qtd_temporada, $qtd_episodio);
            $email->subject = 'Nova Serie Adicionada';
            Mail::to($user)->later(now()->addSeconds($i * 6), $email);
        }
    }
}
