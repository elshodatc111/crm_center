<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('settings', function (Blueprint $table) {
            $table->id();            
            $table->string('name');
            $table->enum('status', ['true', 'false', 'delete'])->default('true');
            $table->decimal('balans_naqt', 15, 2)->default(0);
            $table->decimal('balans_plastik', 15, 2)->default(0);
            $table->decimal('balans_exson', 15, 2)->default(0);
            $table->decimal('exson_foiz', 5, 2)->default(0);
            $table->integer('social_telegram')->default(0);
            $table->integer('social_instagram')->default(0);
            $table->integer('social_facebook')->default(0);
            $table->integer('social_youtube')->default(0);
            $table->integer('social_banner')->default(0);
            $table->integer('social_tanish')->default(0);
            $table->integer('social_boshqa')->default(0);
            $table->integer('message_mavjud')->default(false);
            $table->integer('message_count')->default(0);
            $table->boolean('message_status')->default(false);
            $table->boolean('new_student_sms')->default(false);
            $table->boolean('new_hodim_sms')->default(false);
            $table->boolean('pay_student_sms')->default(false);
            $table->boolean('pay_hodim_sms')->default(false);
            $table->boolean('update_pass_sms')->default(false);
            $table->boolean('birthday_sms')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('settings');
    }
};
