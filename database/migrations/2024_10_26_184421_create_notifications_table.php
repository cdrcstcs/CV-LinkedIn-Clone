<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User ID
            $table->enum('type', ['connection_request', 'job_update', 'message']); // Type
            $table->text('content'); // Content
            $table->boolean('read_status')->default(false); // Read Status
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
