<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeHasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heHas', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();

            $table->primary(array('question_id', 'tag_id')); 

            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heHas');
    }
}
