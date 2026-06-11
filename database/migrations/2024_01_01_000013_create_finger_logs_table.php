<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('finger_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('finger_request_id');
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('completed_by');
            $table->string('status', 50);
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->timestamp('completed_at');
            $table->timestamps();
            $table->foreign('finger_request_id')->references('id')->on('finger_requests')->onDelete('cascade');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('completed_by')->references('id')->on('users');
            $table->index('application_id');
            $table->index('finger_request_id');
            $table->index('completed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finger_logs');
    }
};
