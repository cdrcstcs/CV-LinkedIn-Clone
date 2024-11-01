<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User ID
            $table->text('content'); // Content (text, images, videos)
            $table->integer('likes')->default(0); // Store likes as an integer, default to 0
            $table->json('comments')->nullable(); // Comments (list of comment IDs)
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
