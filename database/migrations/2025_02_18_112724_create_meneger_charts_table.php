<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('meneger_charts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('paymart_add_naqt')->default(0);
            $table->integer('paymart_add_plastik')->default(0);
            $table->integer('chegirma_add')->default(0);
            $table->integer('qaytarildi_add')->default(0);
            $table->integer('create_group')->default(0);
            $table->integer('create_student')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('meneger_charts');
    }
};
