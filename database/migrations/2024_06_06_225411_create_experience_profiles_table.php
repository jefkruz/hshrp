<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->string('experience')->nullable();
            $table->string('department')->nullable();
            $table->string('ministry_start_date')->nullable();
            $table->string('ministry_end_date')->nullable();
            $table->string('ministry_job_role')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('job_role')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experience_profiles');
    }
};
