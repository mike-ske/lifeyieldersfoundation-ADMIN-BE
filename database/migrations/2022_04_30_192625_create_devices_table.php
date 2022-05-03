<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('requesting_officer')->nullable();
            $table->string('mobile')->nullable();
            $table->string('machine_model')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('nature_of_fault')->nullable();
            $table->string('department')->nullable();
            $table->date('date_in')->nullable();
            $table->date('date_of_collection')->nullable();
            $table->string('workdone')->nullable();
            $table->string('workdone_by')->nullable();
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
        Schema::dropIfExists('devices');
    }
}
