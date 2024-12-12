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
        Schema::create('candidates_vagas', function (Blueprint $table) {
            $table->id();
            $table->foreign('job_id')->references('id')->on('job_vacancies')->onDelete('cascade');
            $table->string('job', 25);
			$table->string('full_name');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates_vagas');

    }
};
