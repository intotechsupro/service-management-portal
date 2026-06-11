<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 50)->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('refund_amount', 10, 2);
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->index('code');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
