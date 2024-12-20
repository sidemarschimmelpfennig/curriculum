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
            $table->string('full_name', 200);
            $table->string('email')->unique();
            $table->string('password');
			$table->string('phone');
            $table->text('additional_info', 200)->nullable();
            $table->string('file')->nullable();
            
            $table->string('status')->default('Pendente');
            $table->boolean('active')->default(1);
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');

    }
};
