<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID
            $table->string('name'); // Name
            $table->string('email')->unique(); // Email
            $table->string('password'); // Password (hashed)
            $table->string('profile_picture')->nullable(); // Profile Picture
            $table->string('headline')->nullable(); // Headline
            $table->text('summary')->nullable(); // Summary
            $table->string('location')->nullable(); // Location
            $table->string('industry')->nullable(); // Industry
            $table->json('skills')->nullable(); // Skills (JSON for flexibility)
            $table->json('education_history')->nullable(); // Education History (JSON)
            $table->json('work_experience')->nullable(); // Work Experience (JSON)
            $table->json('connections')->nullable(); // Connections (list of user IDs)
            $table->json('notifications')->nullable(); // Notifications (JSON)
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
