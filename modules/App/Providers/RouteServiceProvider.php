<?php
declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        /** @var Router $router */
        $router = $this->app->make('router');

        $router->namespace('App\Http\Controllers')
            ->prefix('api/v1')
            ->group(fn() => $this->mapRoutes($router));
    }

    private function mapRoutes(Router $router): void
    {
        /** @uses  \App\Http\Controllers\CreateController::__invoke */
        $router->post('/submit', 'CreateController');
    }
}
