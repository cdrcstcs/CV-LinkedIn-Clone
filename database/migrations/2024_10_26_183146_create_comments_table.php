<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // Post ID
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User ID
            $table->text('content'); // Content
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
