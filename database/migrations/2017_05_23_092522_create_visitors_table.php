<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('Visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->char('token',20); 
            $table->char('browser', 32); 
            $table->char('os', 32);  
            $table->integer('link_id');
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
        Schema::dropIfExists('Visitors');
    }
}
