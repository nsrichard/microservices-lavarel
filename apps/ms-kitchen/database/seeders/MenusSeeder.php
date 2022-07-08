<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MenusSeeder extends Seeder
{

    public function run()
    {
        $ingredients = [
            [
                'tomato' => 1,
                'lemon' => 2,
                'potato' => 1,
            ],
            [
                'potato' => 3,
                'rice' => 2,
                'ketchup' => 1,
            ],
            [
                'potato' => 2,
                'rice' => 1,
                'ketchup' => 1,
                'lettuce' => 3,
                'onion' => 3,
            ],
            [
                'onion' => 1,
                'cheese' => 2,
                'meat' => 1,
                'chicken' => 1,
            ],
            [
                'tomato' => 1,
                'potato' => 2,
                'lettuce' => 3,
                'cheese' => 2,
                'chicken' => 1,
            ],
            [
                'tomato' => 1,
                'lemon' => 1,
                'ketchup' => 1,
                'lettuce' => 1,
                'chicken' => 1,
            ],
        ];

        foreach($ingredients as $i => $item){
            DB::table('menus')->insert(['name' => 'Menu ' . ($i + 1)]);
            $id = DB::getPdo()->lastInsertId();
            foreach($item as $name => $qty){
                DB::table('recipes')->insert(['menu_id' => $id, 'ingredient' => $name, 'quantity' => $qty]);
            }
        }
    }
}
