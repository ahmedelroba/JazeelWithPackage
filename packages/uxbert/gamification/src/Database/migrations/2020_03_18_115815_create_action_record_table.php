<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('client_users')->on('id')->onDelete('cascade');

            $table->integer('action_id')->unsigned();
            $table->foreign('action_id')->references('actions')->on('id')->onDelete('cascade');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('clients')->on('id')->onDelete('cascade');

            $table->text('description');
            $table->string('current_points');
            $table->enum('type', ['plus', 'mins']);

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
        Schema::dropIfExists('integ_brand_action_user_rels');
    }
}
