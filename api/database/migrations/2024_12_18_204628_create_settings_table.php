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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
<<<<<<< HEAD
    
            $table->string('smtp_encryption')->default('null');
=======
            $table->string('smtp_encryption')->nullable()->default('none');
>>>>>>> 1b9cb1b52acbdfb518f491fd2aaa7612b3be903f
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
