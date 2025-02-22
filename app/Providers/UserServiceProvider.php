<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function () {
            $users = [
                [
                    'name' => 'Britney Rafer',
                    'gender' => 'Male'
                ],
                [
                    'name' => 'John Doe',
                    'gender' => 'Female'
                ],
            ];

            return new UserService($users);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
