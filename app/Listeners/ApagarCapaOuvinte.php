<?php

namespace App\Listeners;

use App\Events\ApagarCapa;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class ApagarCapaOuvinte
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
     * @param  \App\Events\ApagarCapa  $event
     * @return void
     */
    public function handle(ApagarCapa $event)
    {
        $serie = $event->serie;
        if($serie->capa) Storage::delete($serie->capa);
    }
}
