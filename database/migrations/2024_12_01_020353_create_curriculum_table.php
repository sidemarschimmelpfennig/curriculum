<?php
// By Kochem
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
        Schema::create('curriculum', function (Blueprint $table) {

            // Dados Pessoais
            $table->string('full_name', 200);
            $table->string('cpf', 11)->unique();
            $table->string('address', 100);
            $table->string('district', 100);
            $table->string('uf', 2);
            $table->string('city', 100);
            $table->string('cep', 8);
            $table->string('phone', 100);
            $table->date('date_of_birth');
            $table->string('gender', 1);
            $table->string('nationality', 100)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->string('target_sectors', 100);
            $table->string('target_position', 100);
            $table->string('target_outher', 100)->nullable();
            
            $table->string('photo')->nullable(); // Arquivo
            $table->string('curriculum')->nullable(); // Arquivo
            
            // Login
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            
            // Formação Acadêmica
            $table->string('course', 100)->nullable();
            $table->string('institution', 100)->nullable();
            $table->date('education_start_date')->nullable();
            $table->date('education_end_date')->nullable();
            $table->string('education_level', 100)->nullable();
            $table->string('company', 100)->nullable();
            
            // Experiência Profissional
            $table->text('job_description')->nullable();
            $table->text('enterprise')->nullable();
            $table->text('position')->nullable();
            $table->date('experience_start_date')->nullable();
            $table->date('experience_end_date')->nullable();
            $table->text('additional_info', 200)->nullable();
            
            // Informações adicionais
            $table->string('skills', 100)->nullable();
            $table->string('languages', 100)->nullable();
            $table->decimal('salary_expectation', 10, 2)->nullable();
            
            $table->boolean('is_admin')->default(0);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriclum');
    }
};