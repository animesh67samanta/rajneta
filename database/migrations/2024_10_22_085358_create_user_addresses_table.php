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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('society')->nullable();
            $table->string('house_no')->nullable();
            $table->string('flat_no')->nullable();
            $table->string('address')->nullable();
            $table->string('booth')->nullable();
            $table->string('village')->nullable();
            $table->string('part_no')->nullable();
            $table->string('srn')->nullable();
            $table->string('voting_centre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
