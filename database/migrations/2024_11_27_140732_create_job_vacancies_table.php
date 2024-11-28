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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
			$table->string('name');

            
            $table->foreign('departments_id')->references('id')->on('departments')->nullable()->default(1);
            $table->unsignedBigInteger('departments_id');
            $table->string('departments');

            $table->string('status');
            $table->timestamps();
			
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
