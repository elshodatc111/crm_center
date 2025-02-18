<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('user_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', [
                'visited', 'paymart_add', 'paymart_return', 'paymart_jarima',
                'chegirma_add', 'group_add', 'group_delete', 'password_update'
            ]);
            $table->string('type_commit')->nullable();
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('user_histories');
    }
};
