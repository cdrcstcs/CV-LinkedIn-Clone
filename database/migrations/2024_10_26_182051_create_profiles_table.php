<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User ID
            $table->text('bio')->nullable(); // Bio
            $table->enum('visibility', ['public', 'private'])->default('public'); // Profile Visibility
            $table->string('current_position')->nullable(); // Current Position
            $table->string('profile_url')->unique(); // Profile URL
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
