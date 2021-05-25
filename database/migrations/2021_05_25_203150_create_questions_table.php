<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_type_id')->references('id')->on('question_types')->onDelete('cascade');
            $table->foreignId('question_level_id')->references('id')->on('question_levels')->onDelete('cascade');
            $table->foreignId('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->string('question')->unique()->nullable(false);
            $table->string('picture_url')->nullable(true);
            $table->integer('marks')->nullable(false);

            $table->tinyInteger('inforce')->default('1');
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
        Schema::dropIfExists('questions');
    }
}
