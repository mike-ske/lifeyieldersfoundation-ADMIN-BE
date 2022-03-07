<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_emails', function (Blueprint $table) {
            $table->id();
            $table->string('mail_subject')->nullable();
            $table->text('mail_body')->nullable();
            $table->string('from')->nullable();
            $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');
            $table->integer('status_id')->nullable();
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
        Schema::dropIfExists('admin_emails');
    }
}
