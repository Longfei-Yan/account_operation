<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteAccessLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_access_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->default('')->comment('访问链接');
            $table->string('ip')->default('')->comment('访问IP');
            $table->string('ip_country')->default('')->comment('访问国家');
            $table->string('device')->default('')->comment('访问系统');
            $table->string('language')->default('')->comment('访问语言');
            $table->string('source')->default('')->comment('访问来源');
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
        Schema::dropIfExists('site_access_logs');
    }
}
