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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
			$table->string('full_name', 200);
            $table->string('email')->unique();
			$table->string('contactphone');
            $table->text('additional_info', 200)->nullable();
            $table->text('ability', 200);
            $table->string('file')->nullable();
            
            //$table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');

    }
};
