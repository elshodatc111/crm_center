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
        Schema::create('kassa_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meneger_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('create_time')->useCurrent();
            $table->text('description')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('status'); 
            $table->enum('type', ['naqt_chiq', 'naqt_xar', 'plastik_chiq', 'plastik_xar']);
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('succes_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kassa_histories');
    }
};
