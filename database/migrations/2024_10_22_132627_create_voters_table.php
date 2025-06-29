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
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('surname')->nullable();;
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();

            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->date('dob')->nullable();
            $table->string('cast')->nullable();
            $table->string('position')->nullable();
            $table->string('personnel')->nullable();
            $table->string('voter_id')->nullable();

            $table->boolean('dead')->default(false);
            $table->boolean('voted')->default(false);
            $table->boolean('star_voter')->default(false);

            $table->string('colour_code')->nullable();
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
