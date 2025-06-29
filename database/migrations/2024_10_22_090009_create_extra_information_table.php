<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('extra_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('extra_info_1')->nullable();
            $table->string('extra_info_2')->nullable();
            $table->string('extra_info_3')->nullable();
            $table->string('extra_info_4')->nullable();
            $table->string('extra_info_5')->nullable();
            $table->boolean('extra_check_1')->default(false);
            $table->boolean('extra_check_2')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_information');
    }
};
