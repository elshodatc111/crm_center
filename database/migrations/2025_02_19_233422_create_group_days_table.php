<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('group_days', function (Blueprint $table) {            
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('room_id');
            $table->date('date');
            $table->unsignedBigInteger('lessen_times_id');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('setting_rooms')->onDelete('cascade');
            $table->foreign('lessen_times_id')->references('id')->on('lessen_times')->onDelete('cascade');
        });
    }
    public function down(): void{
        Schema::dropIfExists('group_days');
    }
};
