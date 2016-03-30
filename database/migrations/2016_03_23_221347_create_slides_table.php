<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            //幻灯片ID
            $table->increments('slide_id');
            //幻灯片图象链接
            $table->string('slide_image');
            //幻灯片图象标题
            $table->string('slide_title',50);
            //点击幻灯片时使用的链接
            $table->string('slide_link')->nullable();
            //幻灯片简介
            $table->string('slide_intro')->nullable();
            //权重值
            $table->smallInteger('slide_order_num')->default(100);
            //最后变动的时间
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
        Schema::drop('slides');
    }
}
