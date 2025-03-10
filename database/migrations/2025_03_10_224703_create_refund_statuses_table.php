<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('refund_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paymart_id');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('refund_statuses');
    }
};
