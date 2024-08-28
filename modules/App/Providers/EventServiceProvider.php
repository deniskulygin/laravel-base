<?php
declare(strict_types = 1);

namespace App\Providers;


use App\Listener\SubmissionSavedLogListener;
use App\Service\Event\SubmissionSaved;
use Illuminate\Support\ServiceProvider;
use Illuminate\Events\Dispatcher;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        SubmissionSaved::class => [
            SubmissionSavedLogListener::class,
        ],
    ];

    /**
     * @param Dispatcher $eventDispatcher
     */
    public function boot(Dispatcher $eventDispatcher): void
    {
        foreach ($this->listen as $event => $eventListeners) {
            foreach ($eventListeners as $eventListener) {
                $eventDispatcher->listen([$event], $eventListener);
            }
        }
    }
}
