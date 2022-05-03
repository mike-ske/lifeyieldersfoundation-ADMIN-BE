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
            $table->string('surname');
            $table->string('first_name');
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('school')->nullable();
            $table->string('course_of_study')->nullable();
            $table->string('programme')->nullable();
            $table->date('start_duration')->nullable();
            $table->date('end_duration')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('next_of_kin')->nullable();
            $table->string('next_of_kin_phone_number')->nullable();
            $table->string('relationship')->nullable();
            $table->string('username')->nullable();
            $table->string('email_address')->nullable();
            $table->string('password')->nullable();
            $table->string('verify_password')->nullable();
            $table->string('message')->nullable();
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
