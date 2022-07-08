<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\MarketService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Ingredient;

class IngredientController extends Controller
{

    use ApiResponser;

    public $marketService;
    public function __construct(MarketService $marketService)
    {
        $this->marketService = $marketService;
    }

    public function index()
    {
        $data = Ingredient::get();
        return $this->successResponse($data);
    }

    public function get($ingredient, $quantity)
    {
        $stock = Ingredient::where('name', $ingredient)->first();
        if ($stock){
            while ($stock->quantity < $quantity){
                $data = $this->marketService->buyIngredient($ingredient);
                $data_obj = json_decode($data);
                $stock->quantity += $data_obj->quantitySold;
                $stock->save();
            }
            $stock->quantity -= $quantity;
            $stock->save();
            return $this->successResponse(['success' => true]);
        } else {
            return $this->errorResponse('Not found', 404);
        }
        
    }
}
