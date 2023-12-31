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
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->bigInteger('nationalities_id')->unsigned();
            $table->foreign('nationalities_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->bigInteger('blood_id')->unsigned();
            $table->foreign('blood_id')->references('id')->on('blood_types')->onDelete('cascade');
            $table->date('date_of_birth');
            $table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->bigInteger('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->bigInteger('family_id')->unsigned();
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->string('academic_year');
            $table->softDeletes();
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
