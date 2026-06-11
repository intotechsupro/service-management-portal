<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallet_id');
            $table->enum('transaction_type', ['credit', 'debit']);
            $table->decimal('amount', 15, 2);
            $table->decimal('balance_before', 15, 2)->nullable();
            $table->decimal('balance_after', 15, 2)->nullable();
            $table->string('reference_type', 50)->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            $table->index('wallet_id');
            $table->index('transaction_type');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
