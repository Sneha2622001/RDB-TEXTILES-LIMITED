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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('worker_no')->unique();
            $table->string('worker_name');
            $table->date('date_of_entry');
            $table->string('father_guardian_name');
            $table->enum('sex',['M','F','O']);
            $table->date('date_of_birth');
            $table->date('date_of_joining');
            $table->date('permanent_date');
            $table->date('retirement_date');
            $table->enum('nationality',['indian','other']);
            $table->string('religion');
            $table->date('anniv_date');
            $table->string('esi_no');
            $table->string('pf_no');
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('photo_path')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
