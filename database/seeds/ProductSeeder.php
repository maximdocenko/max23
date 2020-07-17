<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=15; $i++) {
            DB::table('products')->insert([
                'name' => "Product ".$i,
                'price' => rand(100, 1000),
                'user_id' => rand(1,5),
            ]);
        }
    }
}
