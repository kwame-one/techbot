<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentIndexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_indexes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contact');
            $table->unsignedInteger('question_id')->default(1)->nullable();
            $table->foreign('question_id')->references('number')->on('questions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('current_indexes');
    }
}
