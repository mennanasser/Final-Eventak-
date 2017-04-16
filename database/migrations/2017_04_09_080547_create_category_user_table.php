<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryUserTable extends Migration
{
    
    public function up()
    {
        Schema::create('category_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id")->unsigned();
            $table->integer("category_id")->unsigned();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('category_user');
    }
}
