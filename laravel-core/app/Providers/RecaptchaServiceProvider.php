<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class RecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('recaptcha', function () {
            return new class {
                public function verify(string $token, float $threshold = 0.5): bool
                {
                    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                        'secret' => config('services.recaptcha.secret'),
                        'response' => $token,
                    ]);

                    $data = $response->json();
                    return $data['success'] && ($data['score'] ?? 0) >= $threshold;
                }
            };
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
