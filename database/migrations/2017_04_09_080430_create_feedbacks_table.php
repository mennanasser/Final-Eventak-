<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    
    public function up()
    {
          Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->integer("user_id")->unsigned();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
