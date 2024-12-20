
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

            $table->unsignedBigInteger('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('job_vacancies')->onDelete('cascade');
            $table->string('job', 65);

            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
			$table->string('candidate_name');

            $table->string('curriculum');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates_vagas');

    }
};
