<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otp_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('otp_request_id');
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('submitted_by');
            $table->string('otp_value', 50);
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->timestamps();
            $table->foreign('otp_request_id')->references('id')->on('otp_requests')->onDelete('cascade');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('submitted_by')->references('id')->on('users');
            $table->index('application_id');
            $table->index('otp_request_id');
            $table->index('submitted_by');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otp_responses');
    }
};
