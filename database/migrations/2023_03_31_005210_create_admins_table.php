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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('kc_token')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        $d = new \App\Models\Admin();
        $d->name = 'Administrator';
        $d->username = 'jefkruz';
        $d->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
