<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $data = array(
          array('name' => 'leon',
            'email' => 'leon.z@me.com',
            'password' => bcrypt('123456'),
            'active' => 1,
            'mobileNumber' => '18673186398',
            'mobileVerified' => 1
          ),
          array('name' => 'test',
            'email' => 'l_leoboy@qq.com',
            'password' => bcrypt('123'),
            'active' => 0,
            'mobileNumber' => '18673100669',
            'mobileVerified' => 1
          )
        );

        DB::table('users')->insert($data);
    }
}
