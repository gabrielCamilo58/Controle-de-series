<?php

namespace App\Providers;

use App\Events\ApagarCapa;
use App\Events\NovaSerie;
use App\Listeners\ApagarCapaOuvinte;
use App\Listeners\EnviarEmailNovaSerieCadastrada;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NovaSerie::class => [
            EnviarEmailNovaSerieCadastrada::class,
        ],
        ApagarCapa::class => [
            ApagarCapaOuvinte::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
