<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); // Company ID
            $table->string('job_title'); // Job Title
            $table->text('description'); // Description
            $table->string('location'); // Location
            $table->json('skills_required')->nullable(); // Skills Required (JSON)
            $table->foreignId('posted_by')->constrained('users')->onDelete('cascade'); // Posted By (User ID)
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
