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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('coin_name');
            $table->decimal('coin_amount', 15, 8);
            $table->decimal('rate', 15, 2);
            $table->decimal('cost', 15, 2);
            $table->decimal('total', 15, 2);
            $table->tinyInteger('status')->default(1); // 1: active, 2: pending, 3: deactivated, 4: deleted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
