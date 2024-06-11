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
        Schema::create('children_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->string('child_name')->nullable();
            $table->string('child_gender')->nullable();
            $table->string('child_dob')->nullable();
            $table->string('child_school')->nullable();
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
        Schema::dropIfExists('children_profiles');
    }
};
