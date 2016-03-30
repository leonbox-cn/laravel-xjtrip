<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
      $data = array(
        array(
          'product_title' => '韩国两日游',
          'product_poster' => 'null'
        ),
        array(
          'product_title' => '夏日大作战',
          'product_poster' => 'null'
        ),
        array(
          'product_title' => '张家界三天两夜',
          'product_poster' => 'null'
        )
      );

      DB::table('products')->insert($data);

    }
}
