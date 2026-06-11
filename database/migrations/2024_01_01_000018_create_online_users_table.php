<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('online_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->unsignedBigInteger('current_application_id')->nullable();
            $table->timestamp('last_activity_at')->nullable();
            $table->timestamp('logged_in_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('current_application_id')->references('id')->on('applications')->onDelete('set null');
            $table->index('user_id');
            $table->index('logged_in_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('online_users');
    }
};
