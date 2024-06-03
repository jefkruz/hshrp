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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sub_id')->default(1);
            $table->integer('leader_id')->nullable();
            $table->enum('status', ['assigned', 'unassigned'])->default('unassigned');
            $table->timestamps();
        });

        $arr = ['Video Editing Unit', 'Tech Solutions Unit'];

        foreach($arr as $item){
            $a = new \App\Models\Department();
            $a->name = $item;
            $a->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
