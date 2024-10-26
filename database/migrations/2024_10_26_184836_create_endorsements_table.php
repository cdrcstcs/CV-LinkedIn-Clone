<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('endorsements', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User ID (who is endorsed)
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade'); // Skill ID
            $table->foreignId('endorser_id')->constrained('users')->onDelete('cascade'); // Endorser ID
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('endorsements');
    }
};
