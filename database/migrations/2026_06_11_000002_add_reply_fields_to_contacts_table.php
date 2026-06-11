<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('reply_subject')->nullable()->after('message');
            $table->text('reply_message')->nullable()->after('reply_subject');
            $table->timestamp('replied_at')->nullable()->after('reply_message');
            $table->foreignId('replied_by')
                ->nullable()
                ->after('replied_at')
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('replied_by');
            $table->dropColumn(['reply_subject', 'reply_message', 'replied_at']);
        });
    }
};
