<?php

namespace App\Providers;

use App\Services\SettingService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SettingService::class, fn () => new SettingService());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try {
            if (Schema::hasTable('settings')) {
                $settings = $this->app->make(SettingService::class);
                $settings->setSettings();
            }
        } catch (\Throwable $e) {
            // Tránh lỗi khi chạy migration hoặc khi cơ sở dữ liệu chưa sẵn sàng
        }
    }
}

