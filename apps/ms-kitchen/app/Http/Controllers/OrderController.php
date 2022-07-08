<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\WarehouseService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Menu;
use App\Models\Order;

class OrderController extends Controller
{

    use ApiResponser;

    public $warehouseService;
    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function set()
    {
        $selected = Menu::inRandomOrder()->first();
        $order = new Order;
        $order->menu_id = $selected->id;
        $order->status = 'pending';
        $order->save();
        foreach($selected->recipes as $recipe){
            $data = $this->warehouseService->getIngredient($recipe->ingredient, $recipe->quantity);
        }
        $order->status = 'complete';
        $order->save();

        return $this->successResponse(['success' => true]);
        
    }

    public function status($date, $limit = 0)
    {
        $data = Order::whereDate('created_at', '=', $date);
        $data->orderBy('created_at', 'desc');
        if ($limit > 0){
            $data->take($limit);
        }

        return $this->successResponse($data->with('menu')->get());
    }

}
