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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->dateTime('dateTime');
            $table->string('area');
            $table->integer('spray_density');
            $table->unsignedBigInteger('farm_id'); 
            $table->foreign('farm_id')
                ->references('id')
                ->on('farms')
                ->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
