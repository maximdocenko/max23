<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++) {
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'email' => 'test'. $i .'@gmail.com',
                'phone' => rand(100000000000, 999999999999),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
