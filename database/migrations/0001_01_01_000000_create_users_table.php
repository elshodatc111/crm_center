<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();
            $table->date('birthday')->nullable();
            $table->text('about')->nullable();
            $table->integer('group_count')->default(0);
            $table->string('email')->unique();
            $table->enum('type', ['sAdmin', 'admin', 'meneger', 'techer', 'student']);
            $table->enum('status', ['true', 'false', 'locked'])->default('true');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('balans')->default(0);
            $table->unique(['type', 'phone1']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void{
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
