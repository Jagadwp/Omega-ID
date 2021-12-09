<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'admin',
                'status'=>'active',
                'created_at' => '2021-12-10 03:41:55',
                'updated_at' => '2021-12-10 03:41:55'
            ),
            array(
                'name'=>'User',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'user',
                'status'=>'active',
                'created_at' => '2021-12-10 03:41:55',
                'updated_at' => '2021-12-10 03:41:55'
            ),
        );

        DB::table('users')->insert($data);
    }
}
