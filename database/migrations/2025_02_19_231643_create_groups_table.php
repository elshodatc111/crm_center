<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cours_id');
            $table->unsignedBigInteger('setting_rooms_id');
            $table->unsignedBigInteger('techer_id');
            $table->string('group_name');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('setting_paymarts');
            $table->string('weekday');
            $table->integer('lessen_count');
            $table->dateTime('lessen_start')->change();
            $table->dateTime('lessen_end')->change();
            $table->unsignedBigInteger('lessen_times_id');
            $table->unsignedBigInteger('user_id');
            $table->string('next');
            $table->string('techer_paymart');
            $table->string('techer_bonus');
            $table->timestamps();
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
            $table->foreign('setting_rooms_id')->references('id')->on('setting_rooms')->onDelete('cascade');
            $table->foreign('techer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('setting_paymarts')->references('id')->on('setting_paymarts')->onDelete('cascade');
            $table->foreign('lessen_times_id')->references('id')->on('lessen_times')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void{
        Schema::dropIfExists('groups');
    }
};
