<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventUserTable extends Migration
{
    
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('interested');
            $table->integer("user_id")->unsigned();
            $table->integer("event_id")->unsigned();
            $table->timestamps();
        });
    }

    
    public function down()
    {
     Schema::dropIfExists('event_user');   
    }
}
