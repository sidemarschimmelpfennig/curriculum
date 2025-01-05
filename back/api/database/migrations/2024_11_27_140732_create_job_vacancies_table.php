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
			$table->text('description', 200);
            $table->string('skills', 255);

            $table->unsignedBigInteger('departament_id');
            $table->foreign('departament_id')->references('id')->on('departaments')->onDelete('cascade');
            $table->string('departament', 25);

            $table->unsignedBigInteger('departament_categories_id');
            $table->foreign('departament_categories_id')->references('id')->on('departament_categories')->onDelete('cascade');
            $table->string('departament_categories', 25);

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->string('status', 25);

            $table->unsignedBigInteger('mobilities_id');
            $table->foreign('mobilities_id')->references('id')->on('mobilities')->onDelete('cascade');
            $table->string('mobilities', 25);

            $table->boolean('active')->default(1);

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
