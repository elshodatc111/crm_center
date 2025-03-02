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
        if (!Schema::hasTable('varonka_histories')) {
            Schema::create('varonka_histories', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('varonka_id');
                $table->text('comment');
                $table->unsignedBigInteger('admin_id');
                $table->timestamps();
    
                $table->foreign('varonka_id')->references('id')->on('varonkas')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varonka_histories');
    }
};
