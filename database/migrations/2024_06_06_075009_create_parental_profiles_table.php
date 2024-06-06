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
        Schema::create('parental_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->string('parents_alive')->nullable();
            $table->string('parents_born_again')->nullable();
            $table->string('ministry_members')->nullable();
            $table->string('parents_denomination')->nullable();
            $table->string('parents_zone')->nullable();
            $table->string('parents_church')->nullable();
            $table->string('parents_pastor')->nullable();
            $table->string('siblings_number')->nullable();
            $table->string('family_position')->nullable();
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
        Schema::dropIfExists('parental_profiles');
    }
};
