<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->bigInteger('imageable_id')->unsigned()->comment('(Student, Family ID)');
            //$table->foreign('imageable_id')->references('id')->on('students')->onDelete('cascade');
            //$table->foreign('imageable_id')->references('id')->on('families')->onDelete('cascade');
            $table->string('imageable_type')->comment('(Model path)');
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
        Schema::dropIfExists('images');
    }
}
