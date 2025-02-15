<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('lessen_times', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->comment('Dars raqami');
            $table->string('time')->comment('Dars vaqti MM:SS - MM:SS formatida');
            $table->timestamps();
        });
    }
   public function down(): void
    {
        Schema::dropIfExists('lessen_times');
    }
};
