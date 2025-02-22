<?php

declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->setupLogViewer();
    }

    private function setupLogViewer(): void
    {
        LogViewer::auth(fn ($request) => $request->user()?->is_admin);
    }
}
