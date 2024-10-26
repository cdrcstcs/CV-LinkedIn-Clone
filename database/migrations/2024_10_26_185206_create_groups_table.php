<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id(); // ID
            $table->string('name'); // Name
            $table->text('description')->nullable(); // Description
            $table->foreignId('admin_user_id')->constrained('users')->onDelete('cascade'); // Admin User ID
            $table->json('members')->nullable(); // Members (list of user IDs)
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
