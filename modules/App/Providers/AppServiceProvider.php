<?php
declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use App\Exception\Handler;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->basePath('modules/App');

        $this->app->singleton(ExceptionHandler::class, Handler::class);
    }
}
