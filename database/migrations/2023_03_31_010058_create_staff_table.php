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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id');
            $table->integer('role_id')->nullable();
            $table->integer('portal_id')->nullable();
            $table->string('title')->nullable();
            $table->string('username')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('designation')->nullable();
            $table->string('rank')->nullable();
            $table->string('job_function')->nullable();
            $table->string('email')->nullable();
            $table->string('alt_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('kc_phone')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('dob')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('shirt_size')->nullable();
            $table->string('t_shirt_size')->nullable();
            $table->string('dress_size')->nullable();
            $table->string('gender')->nullable();
            $table->string('house_address')->nullable();
            $table->string('bus_stop')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->enum('is_leader', ['yes', 'no'])->default('no');
            $table->string('kc_token')->nullable();
            $table->string('status')->nullable();
            $table->string('nok1_name')->nullable();
            $table->string('nok1_phone')->nullable();
            $table->string('nok1_relationship')->nullable();
            $table->string('nok2_name')->nullable();
            $table->string('nok2_phone')->nullable();
            $table->string('nok2_relationship')->nullable();
            $table->string('genotype')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('allergies')->nullable();
            $table->string('health_condition')->nullable();
            $table->string('health_insurance')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('staff');
    }
};
