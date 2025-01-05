<?php
// By Kochem
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100);
            $table->string('email', 100)->unique(); 
            $table->string('password', 100);
			$table->string('phone', 16);
            $table->text('additional_info', 200)->nullable();
            $table->string('gender', 6);
            
            $table->string('curriculum')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('is_admin')->default(0);
            
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');

    }
};
