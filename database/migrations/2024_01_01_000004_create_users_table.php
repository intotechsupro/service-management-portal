<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20)->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_online')->default(false);
            $table->timestamp('last_activity_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('device_info', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('two_factor_enabled')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('set null');
            $table->index('email');
            $table->index('role_id');
            $table->index('is_active');
            $table->index('is_online');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
