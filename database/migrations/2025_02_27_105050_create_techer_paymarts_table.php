<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('techer_paymarts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade'); 
            $table->decimal('amount', 15, 2); 
            $table->enum('type', ['naqt', 'plastik']);
            $table->text('description')->nullable();
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('techer_paymarts');
    }
};
