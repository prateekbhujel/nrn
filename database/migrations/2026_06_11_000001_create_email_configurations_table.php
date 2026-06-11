<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('mailer')->default('smtp');
            $table->string('host')->nullable();
            $table->unsignedInteger('port')->nullable();
            $table->string('encryption')->nullable();
            $table->string('username')->nullable();
            $table->text('password')->nullable();
            $table->string('from_address')->nullable();
            $table->string('from_name')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $password = env('MAIL_PASSWORD', config('mail.mailers.smtp.password'));

        DB::table('email_configurations')->insert([
            'mailer' => 'smtp',
            'host' => env('MAIL_HOST', config('mail.mailers.smtp.host')),
            'port' => env('MAIL_PORT', config('mail.mailers.smtp.port')),
            'encryption' => env('MAIL_ENCRYPTION', config('mail.mailers.smtp.encryption')),
            'username' => env('MAIL_USERNAME', config('mail.mailers.smtp.username')),
            'password' => $password ? Crypt::encryptString($password) : null,
            'from_address' => env('MAIL_FROM_ADDRESS', config('mail.from.address')),
            'from_name' => env('MAIL_FROM_NAME', config('mail.from.name')),
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('email_configurations');
    }
};
