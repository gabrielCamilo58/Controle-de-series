<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNovaSerie extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $qtdEpisodios;
    public $qtdTemporadas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome, $qtdTemporadas, $qtdEpisodios)
    {
        $this->nome = $nome;
        $this->qtdTemporadas = $qtdTemporadas;
        $this->qtdEpisodios = $qtdEpisodios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail.Series.MailNovaSerie');
    }
}
