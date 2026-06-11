<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('role_id');
            $table->decimal('price', 10, 2);
            $table->date('effective_from')->nullable();
            $table->date('effective_to')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->index('service_id');
            $table->index('role_id');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricing');
    }
};
