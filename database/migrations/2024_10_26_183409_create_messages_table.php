<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // Sender ID
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); // Receiver ID
            $table->text('content'); // Content
            $table->timestamps(); // Created at & Updated at
            $table->boolean('read_status')->default(false); // Read Status
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
