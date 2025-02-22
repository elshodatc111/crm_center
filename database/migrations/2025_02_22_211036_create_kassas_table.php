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
        Schema::create('kassas', function (Blueprint $table) {
            $table->id();
            $table->decimal('naqt', 15, 2)->default(0);
            $table->decimal('naqt_xar_pedding', 15, 2)->default(0);
            $table->decimal('naqt_chiq_pedding', 15, 2)->default(0);
            $table->decimal('naqt_qayt_pedding', 15, 2)->default(0);
            $table->decimal('plastik', 15, 2)->default(0);
            $table->decimal('plastik_xar_pedding', 15, 2)->default(0);
            $table->decimal('plastik_chiq_pedding', 15, 2)->default(0);
            $table->decimal('plastik_qayt_pedding', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kassas');
    }
};
