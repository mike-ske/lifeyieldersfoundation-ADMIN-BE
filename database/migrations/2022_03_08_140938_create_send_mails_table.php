<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_mails', function (Blueprint $table) {
            $table->id();
            $table->string('to')->nullable();
            $table->string('from')->nullable();
            $table->string('subject')->nullable();
            $table->longText('body')->nullable();
            $table->unsignedBigInteger('admin_id')->default(0);
            $table->unsignedBigInteger('role_id')->default(0);
            $table->timestamps();

            // $table->foreign('admin_id')
            //         ->references('id')
            //         ->on('users')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');

            // $table->foreign('role_id')
            //         ->references('id')
            //         ->on('roles')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('send_mails');
    }
}
