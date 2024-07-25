<?php

namespace Ijodkor\LaravelApiResponse\Providers;

use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void {
        if ($this->app->runningInConsole()) {
            $this->commands([]);
        }

        $this->configurePublishing();
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    private function configurePublishing(): void {
        if (!$this->app->runningInConsole()) {
            return;
        }
    }
}