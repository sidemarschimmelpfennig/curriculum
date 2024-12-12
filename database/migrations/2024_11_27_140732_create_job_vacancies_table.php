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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
			$table->string('name', 100);

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departaments')->onDelete('cascade');
            $table->string('department', 25);

            $table->unsignedBigInteger('department_categories_id');
            $table->foreign('department_categories_id')->references('id')->on('departament_categories')->onDelete('cascade');
            $table->string('department_categories', 25);

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->string('status', 10);

            //$table->string('apply_candidates');

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
