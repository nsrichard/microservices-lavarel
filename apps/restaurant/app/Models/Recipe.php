<?php

namespace App\Models;

class Recipe
{
    
    private $data = [
        'food-1' => [
            'tomato' => 1,
            'lemon' => 2,
            'potato' => 1,
        ],
        'food-2' => [
            'potato' => 3,
            'rice' => 2,
            'ketchup' => 1,
        ],
        'food-3' => [
            'potato' => 2,
            'rice' => 1,
            'ketchup' => 1,
            'lettuce' => 3,
            'onion' => 3,
        ],
        'food-4' => [
            'onion' => 1,
            'cheese' => 2,
            'meat' => 1,
            'chicken' => 1,
        ],
        'food-5' => [
            'tomato' => 1,
            'potato' => 2,
            'lettuce' => 3,
            'cheese' => 2,
            'chicken' => 1,
        ],
        'food-6' => [
            'tomato' => 1,
            'lemon' => 1,
            'ketchup' => 1,
            'lettuce' => 1,
            'chicken' => 1,
        ],
    ];

	public function getAll(){
        return $this->data;
    }
    

}