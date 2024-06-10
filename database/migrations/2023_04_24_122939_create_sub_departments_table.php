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
        Schema::create('sub_departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hod_id')->nullable();
            $table->timestamps();
        });
        $d = new \App\Models\SubDepartment();
        $d->name = 'Healing School';
        $d->save();

    }


    public function down()
    {
        Schema::dropIfExists('sub_departments');
    }
};
