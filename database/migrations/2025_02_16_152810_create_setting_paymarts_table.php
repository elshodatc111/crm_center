<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('setting_paymarts', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->decimal('chegirma', 10, 2)->default(0);
            $table->decimal('admin_chegirma', 10, 2)->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['true', 'false', 'delete'])->default('true');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('setting_paymarts');
    }
};
