<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade'); // Job ID
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User ID
            $table->enum('status', ['applied', 'interviewed', 'offered', 'rejected']); // Status
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
