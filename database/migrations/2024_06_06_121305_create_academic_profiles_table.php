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
        Schema::create('academic_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->string('institution')->nullable();
            $table->string('subject')->nullable();
            $table->string('start_date')->nullable();
            $table->string('complete_date')->nullable();
            $table->string('degree')->nullable();
            $table->string('grade')->nullable();
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
        Schema::dropIfExists('academic_profiles');
    }
};
