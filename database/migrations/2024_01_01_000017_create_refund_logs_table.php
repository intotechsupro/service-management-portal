<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('refund_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('wallet_id');
            $table->decimal('refund_amount', 10, 2);
            $table->string('reason', 255)->nullable();
            $table->unsignedBigInteger('initiated_by');
            $table->enum('status', ['pending', 'processed', 'rejected'])->default('pending');
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            $table->foreign('initiated_by')->references('id')->on('users');
            $table->index('application_id');
            $table->index('wallet_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refund_logs');
    }
};
