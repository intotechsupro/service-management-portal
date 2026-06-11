<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->decimal('balance', 15, 2)->default(0);
            $table->decimal('total_credit', 15, 2)->default(0);
            $table->decimal('total_debit', 15, 2)->default(0);
            $table->boolean('is_locked')->default(false);
            $table->string('locked_reason', 255)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index('user_id');
            $table->index('balance');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
