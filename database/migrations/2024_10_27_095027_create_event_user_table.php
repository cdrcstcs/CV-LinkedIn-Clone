<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {
            $table->id(); // Optional, you can remove this if you don't need a primary key
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // Event ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User ID
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_user');
    }
};
