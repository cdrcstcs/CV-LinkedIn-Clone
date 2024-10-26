<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // ID
            $table->string('title'); // Title
            $table->text('description')->nullable(); // Description
            $table->dateTime('date_time'); // Date & Time
            $table->string('location')->nullable(); // Location
            $table->foreignId('host_user_id')->constrained('users')->onDelete('cascade'); // Host User ID
            $table->json('attendees')->nullable(); // Attendees (list of user IDs)
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
