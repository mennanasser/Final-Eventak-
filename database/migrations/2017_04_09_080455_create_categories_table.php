<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('image');      //  width , hieght 225*225
            $table->timestamps();
        });
    }

    
    public function down()
    {
         Schema::dropIfExists('categories');
    }
}
