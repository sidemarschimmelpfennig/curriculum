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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('contactphone');
			$table->string('contactphonetwo');
			$table->string('email');
			$table->string('city');
			$table->string('address');
			$table->string('curriculum');
			$table->string('additional');
			$table->string('socialmedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
