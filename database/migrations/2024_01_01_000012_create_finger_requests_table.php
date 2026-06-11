<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('finger_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('operator_id');
            $table->integer('request_count')->default(1);
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('operator_id')->references('id')->on('users');
            $table->index('application_id');
            $table->index('operator_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finger_requests');
    }
};
