<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('setting_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['true', 'delete'])->default('true');
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('setting_rooms');
    }
};
