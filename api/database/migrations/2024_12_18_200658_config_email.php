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
        Schema::table('settings', function (Blueprint $table){
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('smtp_encryption')->default('null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
