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
			$table->string('full_name');
			$table->string('contactphone');
			$table->string('contactphonetwo')->nullable();
			$table->string('email')->unique();
			$table->string('city');
			$table->string('address');
			$table->text('observation');
			$table->string('additional')->nullable();
			$table->string('socialmedia')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');

    }
};
