<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLyfApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lyf_application', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->unsignedBigInteger('continent_id')->constrained()->onDelete('cascade');
            $table->string('dob');
            $table->string('school');
            $table->string('typeID');
            $table->string('idNum');
            $table->text('certificate');
            $table->text('transcript');
            $table->text('idCard');
            $table->text('examco');
            $table->text('cv');
            $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('lyf_application');
    }
}
