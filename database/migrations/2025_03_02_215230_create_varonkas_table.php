<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('varonkas', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('status', ['new', 'repeat', 'pedding', 'success', 'cancel'])->default('new');
            $table->unsignedBigInteger('register_id')->default(0);
            $table->enum('type_social', [
                'social_telegram', 'social_facebook', 'social_youtube',
                'social_banner', 'social_tanish', 'social_boshqa'
            ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varonkas');
    }
};
