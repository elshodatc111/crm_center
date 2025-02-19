<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('group_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('start_meneger')->nullable();
            $table->text('start_discription')->nullable();
            $table->unsignedBigInteger('end_meneger')->nullable();
            $table->text('end_discription')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('jarima_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('start_meneger')->references('id')->on('users')->onDelete('set null');
            $table->foreign('end_meneger')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void{
        Schema::dropIfExists('group_users');
    }
};
