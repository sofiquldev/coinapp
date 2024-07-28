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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('tnx_type')->nullable(); // 1: credit, 2: debit
            $table->decimal('amount', 15, 12);
            $table->string('account_type', 255);
            $table->string('account_number', 36);
            $table->string('tnx_id')->nullable();
            $table->integer('balance')->nullable();
            $table->string('screenshot')->nullable();
            $table->json('account_info')->nullable();
            $table->tinyInteger('status')->default(1); // 1: active, 2: pending, 3: deactivated, 4: deleted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
