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
        Schema::create('appraisal_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attribute');
            $table->text('description');
            $table->timestamps();
        });

        $t = new \App\Http\Controllers\AppraisalController();
        $attributes = $t->template();

        foreach($attributes as $attribute){
            $n = new \App\Models\AppraisalAttribute();
            $n->attribute = $attribute['attribute'];
            $n->description = $attribute['description'];
            $n->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appraisal_attributes');
    }
};
