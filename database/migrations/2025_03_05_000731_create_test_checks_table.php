<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('test_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->integer('count');
            $table->integer('count_true');
            $table->decimal('ball', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('test_checks');
    }
};
