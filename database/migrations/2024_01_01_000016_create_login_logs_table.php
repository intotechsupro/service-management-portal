<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('login_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('email');
            $table->string('ip_address', 45);
            $table->string('user_agent', 255)->nullable();
            $table->enum('status', ['success', 'failed']);
            $table->string('failure_reason', 255)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->index('user_id');
            $table->index('ip_address');
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_logs');
    }
};
