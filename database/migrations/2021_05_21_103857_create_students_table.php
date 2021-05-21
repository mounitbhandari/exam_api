<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();


            $table->string('student_name')->unique()->nullable(false);
            $table->string('father_name')->nullable(true);
            $table->string('mother_name')->nullable(true);
            $table->string('guardian_name')->nullable(true);
            $table->string('relation_to_guardian')->nullable(true);
            $table->date('dob')->nullable(true);
            $table->enum('sex', array('M', 'F', 'O'))->default('O');
            $table->string('address')->nullable(true);
            $table->string('city',50)->nullable(true);
            $table->string('district',50)->nullable(true);

            // $table->unsignedBigInteger('state_id');
            // $table ->foreign('state_id')->references('id')->on('states')->onDelete('cascade');

            $table->string('pin',8)->nullable(true);
            $table->string('guardian_contact_number',15)->nullable(true);
            $table->string('whatsapp_number',15)->nullable(true);
            $table->string('email_id',255)->nullable(true);

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
        Schema::dropIfExists('students');
    }
}
