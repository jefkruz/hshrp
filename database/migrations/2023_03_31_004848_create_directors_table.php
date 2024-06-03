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
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->string('password');
            $table->string('office');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        $d = new \App\Models\Director();
        $d->title = 'Pastor';
        $d->firstname = 'Rita';
        $d->lastname = 'Ijomah';
        $d->username = 'director';
        $d->password = bcrypt(1234);
        $d->office = 'Office of the Chief of Staff';
        $d->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directors');
    }
};
