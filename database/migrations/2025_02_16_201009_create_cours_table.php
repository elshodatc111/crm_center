<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('cours_name');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['true', 'false'])->default('true');
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('cours');
    }
};
