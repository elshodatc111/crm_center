<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cours_audios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cours_id')->constrained('cours')->onDelete('cascade');
            $table->string('audio_name');
            $table->integer('audio_number')->default(1);
            $table->string('audio_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cours_audios');
    }
};
