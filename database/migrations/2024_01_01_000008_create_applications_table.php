<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_id', 50)->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->string('applicant_name');
            $table->string('aadhaar_number', 20)->nullable();
            $table->string('mobile_number', 20);
            $table->string('ip_address', 45)->nullable();
            $table->string('teamviewer_id', 100)->nullable();
            $table->string('teamviewer_password', 255)->nullable();
            $table->text('remarks')->nullable();
            $table->enum('status', ['pending', 'processing', 'otp_required', 'finger_required', 'hold', 'success', 'rejected'])->default('pending');
            $table->unsignedBigInteger('current_operator_id')->nullable();
            $table->decimal('charge_amount', 10, 2)->nullable();
            $table->decimal('refund_amount', 10, 2)->nullable();
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('current_operator_id')->references('id')->on('users')->onDelete('set null');
            $table->index('user_id');
            $table->index('status');
            $table->index('application_id');
            $table->index('current_operator_id');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
