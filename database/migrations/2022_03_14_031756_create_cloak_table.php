<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCloakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloak', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->comment('网站ID');
            $table->integer('country_id')->comment('国家ID');
            $table->string('landing_link')->default('')->comment('落地页');
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
        Schema::dropIfExists('cloak');
    }
}
