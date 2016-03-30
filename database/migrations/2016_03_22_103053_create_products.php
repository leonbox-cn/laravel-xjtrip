<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products',function(Blueprint $table){
          $table->increments('product_id'); //产品ID
          $table->string('product_title');  //产品标题
          $table->string('product_poster'); //产品海报 image url相对位置
          $table->integer('product_silde_id')->nullable();  //海报图片列表表的id

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('products');
    }
}
