<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        require_once app_path('Helpers/helpers.php');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (Schema::hasTable('settings')) {
                $settings = Setting::pluck('value', 'key')->toArray();
                View::share('settings', $settings);

                // Dynamically bind mail credentials from database
                if (!empty($settings['mail_host'])) {
                    config([
                        'mail.default' => $settings['mail_mailer'] ?? 'smtp',
                        'mail.mailers.smtp.host' => $settings['mail_host'],
                        'mail.mailers.smtp.port' => (int) ($settings['mail_port'] ?? 587),
                        'mail.mailers.smtp.encryption' => ($settings['mail_encryption'] ?? 'tls') === 'none' ? null : ($settings['mail_encryption'] ?? 'tls'),
                        'mail.mailers.smtp.username' => $settings['mail_username'] ?? null,
                        'mail.mailers.smtp.password' => $settings['mail_password'] ?? null,
                        'mail.from.address' => $settings['mail_from_address'] ?? 'noreply@voltiva.com',
                        'mail.from.name' => $settings['mail_from_name'] ?? 'Voltiva',
                    ]);

                    if (isset($settings['mail_verify_peer']) && $settings['mail_verify_peer'] === '0') {
                        config([
                            'mail.mailers.smtp.stream' => [
                                'ssl' => [
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true,
                                ],
                            ],
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            // Database not ready or connection failed, skip loading settings.
        }
    }
}
