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
        Schema::create('curricum_creates', function (Blueprint $table) {

            // Dados Pessoais
            //$table->string('Full_Name');
            $table->string('full_Name', 200);
            $table->string('CPF', 10)->unique();
            $table->string('email', 100)->unique();
            $table->string('address', 100);
            $table->string('district', 100);
            $table->string('UF', 2);
            $table->string('City', 100);
            $table->string('CEP', 8);
            $table->string('phone', 100);
            $table->date('date_of_birth', 8);
            $table->string('gender', 1);
            $table->string('nationality', 100)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->string('photo')->nullable();
            $table->string('Target_Sectors', 100);
            $table->string('Target_Position', 100);
            $table->string('Target_outher', 100)->nullable();

            // Formação Acadêmica
            $table->string('course', 100)->nullable();
            $table->string('Institution', 100)->nullable();
            $table->date('education_start_date', 8)->nullable();
            $table->date('education_end_date', 8)->nullable();
            $table->string('education_level', 100)->nullable();
            $table->string('company', 100)->nullable();

            // Experiência Profissional
            $table->text('job_description', 200)->nullable();
            $table->text('Enterprise', 200)->nullable();
            $table->text('Position', 200)->nullable();
            $table->date('experience_start_date', 8)->nullable();
            $table->date('experience_end_date', 8)->nullable();
            $table->text('additional_info', 200)->nullable();

            // Informações adicionais
            $table->string('skills', 100)->nullable();
            $table->string('languages', 100)->nullable();
            $table->decimal('salary_expectation', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricum_creates');
    }
};
