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
        Schema::create('ministry_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->string('church')->nullable();
            $table->string('zone')->nullable();
            $table->string('pastor')->nullable();
            $table->string('cell_leader')->nullable();
            $table->string('cell_responsibility')->nullable();
            $table->string('born_again_year')->nullable();
            $table->string('born_again_where')->nullable();
            $table->string('baptised_year')->nullable();
            $table->string('baptised_where')->nullable();
            $table->string('foundation_school_year')->nullable();
            $table->string('foundation_school_where')->nullable();
            $table->string('ministry_year')->nullable();
            $table->string('employment_year')->nullable();
            $table->string('department_year')->nullable();
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
        Schema::dropIfExists('ministry_profiles');
    }
};
