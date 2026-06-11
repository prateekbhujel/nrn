<?php

namespace App\Helper;

use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\Schema;
use Throwable;

class MailHelper
{
    public static function setMailConfig(): void
    {
        try {
            if (! Schema::hasTable('email_configurations')) {
                return;
            }

            $emailConfig = EmailConfiguration::query()
                ->where('is_active', true)
                ->first();

            if (! $emailConfig || blank($emailConfig->host) || blank($emailConfig->from_address)) {
                return;
            }

            config([
                'mail.default' => 'smtp',
                'mail.mailers.smtp' => [
                    'transport' => 'smtp',
                    'url' => null,
                    'host' => $emailConfig->host,
                    'port' => $emailConfig->port,
                    'encryption' => $emailConfig->encryption,
                    'username' => $emailConfig->username,
                    'password' => $emailConfig->password,
                    'timeout' => null,
                    'local_domain' => env('MAIL_EHLO_DOMAIN'),
                ],
                'mail.from.address' => $emailConfig->from_address,
                'mail.from.name' => $emailConfig->from_name ?: config('app.name'),
            ]);
        } catch (Throwable) {
            return;
        }
    }
}
