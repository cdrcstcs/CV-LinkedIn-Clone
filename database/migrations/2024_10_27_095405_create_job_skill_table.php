<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_skill', function (Blueprint $table) {
            $table->id(); // Optional, you can remove if you don't need a primary key
            $table->foreignId('job_id')->constrained()->onDelete('cascade'); // Job ID
            $table->foreignId('skill_id')->constrained()->onDelete('cascade'); // Skill ID
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_skill');
    }
};
