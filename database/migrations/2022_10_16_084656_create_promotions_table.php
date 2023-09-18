<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('from_grade')->unsigned();
            $table->foreign('from_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->bigInteger('from_classroom')->unsigned();
            $table->foreign('from_classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->bigInteger('from_section')->unsigned();
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->string('from_academic_year');
            $table->bigInteger('to_grade')->unsigned();
            $table->foreign('to_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->bigInteger('to_classroom')->unsigned();
            $table->foreign('to_classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->bigInteger('to_section')->unsigned();
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
            $table->string('to_academic_year');
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
        Schema::dropIfExists('promotions');
    }
}
