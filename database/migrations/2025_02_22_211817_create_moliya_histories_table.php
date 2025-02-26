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
        Schema::create('moliya_histories', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'xar_naqt', 'xar_plastik', 
                'chiq_naqt', 'chiq_plastik',
                'chiq_exson',
            ]);
            $table->decimal('amount', 15, 2);
            $table->text('comment')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moliya_histories');
    }
};
