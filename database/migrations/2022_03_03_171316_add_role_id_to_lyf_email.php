<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToLyfEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lyf_email', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('role_id')->constrained()->onDelete('cascade');
            $table->longText('mail_body')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lyf_email', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->longText('mail_body');
        });
    }
}
