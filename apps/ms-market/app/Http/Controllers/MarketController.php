<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AlegraMarketService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Buy;

class MarketController extends Controller
{

    use ApiResponser;

    public $alegraMarketService;

    public function __construct(AlegraMarketService $alegraMarketService)
    {
        $this->alegraMarketService = $alegraMarketService;
    }

    public function buy($ingredient)
    {
        $data = [];
        do{
            $data = $this->alegraMarketService->buyIngredient($ingredient);
            $data_obj = json_decode($data);
            if ($data_obj->quantitySold > 0){
                $buy = new Buy;
                $buy->name = $ingredient;
                $buy->quantity = $data_obj->quantitySold;
                $buy->save();
            }
        } while ($data_obj->quantitySold == 0);
        return $this->successResponse($data);
    }

    public function history($date, $limit = 0){
        $data = Buy::whereDate('created_at', '=', $date);
        $data->orderBy('created_at', 'desc');
        if ($limit > 0){
            $data->take($limit);
        }
        return $this->successResponse($data->get());
    } 
}
