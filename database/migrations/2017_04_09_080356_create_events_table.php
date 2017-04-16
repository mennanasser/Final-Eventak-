<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
  
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('description');
            $table->integer('category_id')->unsigned();
            $table->text('image');
            $table->integer("user_id")->unsigned(); //create
            $table->integer("location_id")->unsigned(); 
            $table->enum('approved',['waiting','accepted','rejected']) ;//create
            $table->timestamps();  
        });
    }

    
    public function down()
    {
        
        Schema::dropIfExists('events');
    }
}
