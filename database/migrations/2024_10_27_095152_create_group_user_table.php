<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->id(); // Optional, can be removed if not needed
            $table->foreignId('group_id')->constrained()->onDelete('cascade'); // Group ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User ID
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('group_user');
    }
};
