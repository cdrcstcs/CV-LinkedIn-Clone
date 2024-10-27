<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User ID
            $table->foreignId('skill_id')->constrained()->onDelete('cascade'); // Skill ID
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_skills');
    }
};
