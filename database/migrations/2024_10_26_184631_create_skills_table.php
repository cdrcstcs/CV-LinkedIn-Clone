<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Make sure this line exists
            $table->string('name')->unique(); // Name
            $table->timestamps(); // Created at & Updated at
        });
        
        // Pivot table for many-to-many relationship between users and skills
        Schema::create('skill_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade'); // Skill ID
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User ID
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skill_user');
        Schema::dropIfExists('skills');
    }
};
