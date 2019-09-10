<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                ['id' => $notifiable->getKey()]
            );

            return (new MailMessage())
                ->subject('Xác thực email')
                ->line('Bạn xác thực email bằng cách nhấn vào liên kết bên dưới')
                ->action('Xác thực', $verifyUrl);
        });
    }

}
