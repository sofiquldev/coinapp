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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('activity_type')->default(1); // SiteOptions('activity_types')
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('executed_id')->default(1);
            $table->string('message');
            $table->string('ip_address')->default('0.0.0.0');
            $table->tinyInteger('status')->default(1); // 1: active 4: delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
