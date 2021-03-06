<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicks', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('link_id');
            $table->char('link_url', 255);
            $table->integer('visitor_id');
            $table->char('ip', 23); 
            $table->char('visitor_token', 20);
            $table->char('visitor_ua', 255);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clicks');
    }
}
