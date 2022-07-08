<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class IngredientsSeeder extends Seeder
{

    public function run()
    {
        DB::table('ingredients')->insert(['name' => 'tomato', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'lemon', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'potato', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'rice', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'ketchup', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'lettuce', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'onion', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'cheese', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'meat', 'quantity' => 5]);
        DB::table('ingredients')->insert(['name' => 'chicken', 'quantity' => 5]);
    }
}
