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
        Schema::create('sclasses', function (Blueprint $table) {
            $table->id();
            $table->integer('schools_id');
            $table->integer('enter_school_year');
            $table->string('class_title');
            $table->integer('class_num');
            $table->integer('is_graduated');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sclasses');
    }
};
