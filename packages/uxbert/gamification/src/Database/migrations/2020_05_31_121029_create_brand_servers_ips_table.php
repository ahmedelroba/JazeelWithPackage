<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandServersIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_servers_ips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('ip');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('clients')->on('id')->onDelete('cascade');
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
        Schema::dropIfExists('brand_servers_ips');
    }
}
