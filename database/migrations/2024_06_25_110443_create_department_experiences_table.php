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
        Schema::create('department_experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->string('department')->nullable();
            $table->string('experience')->nullable();
            $table->string('unit')->nullable();
            $table->text('job_role')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('department_experiences');
    }
};
