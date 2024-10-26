<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id_1')->constrained('users')->onDelete('cascade'); // User ID 1
            $table->foreignId('user_id_2')->constrained('users')->onDelete('cascade'); // User ID 2
            $table->enum('status', ['pending', 'accepted', 'declined']); // Status
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('connections');
    }
};