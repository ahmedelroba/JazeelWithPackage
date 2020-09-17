<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     *  *
     * @param string Name
     * @param string Description
     * @param string URL
     * @param string Username
     * @param string Job_Title
     * @param string Email
     * @param string Password
     * @param string Industry
     * @param string City
     * @param string Country
     *
     * @return void
     */
    public function up()
    {

        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('url');
            $table->string('username');
            $table->string('job_title');
            $table->string('email')->unique();
            $table->string('industry');
            $table->string('country');
            $table->string('city');
            $table->string('phone');
            $table->string('client_id')->unique();
            $table->string('client_secret');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('users')->on('id')->onDelete('cascade');
            $table->enum('status', ['active', 'pending', 'deactive'])->default('pending');
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
        Schema::dropIfExists('clients');
    }
}
