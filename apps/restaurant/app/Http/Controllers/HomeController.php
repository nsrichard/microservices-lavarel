<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\KitchenService;
use App\Services\MarketService;
use App\Services\WarehouseService;
use App\Events\OrderEvent;

class HomeController extends BaseController
{

    public $kitchenService;
    public $marketService;
    public $warehouseService;

    public function __construct(KitchenService $kitchenService, 
        MarketService $marketService,
        WarehouseService $warehouseService)
    {
        $this->kitchenService = $kitchenService;
        $this->marketService = $marketService;
        $this->warehouseService = $warehouseService;
    }

    public function index(){

        $orders = json_decode($this->kitchenService->getStatus(date('Y-m-d'), 0));
        $buys = json_decode($this->marketService->getHistory(date('Y-m-d'), 0));
        $stocks = json_decode($this->warehouseService->getStock());
        $menu = json_decode($this->kitchenService->getMenu());

        return view('home')
                        ->with('orders', $orders)
                        ->with('buys', $buys)
                        ->with('stocks', $stocks)
                        ->with('menu', $menu);
    }

    public function order(){

        $this->kitchenService->setOrder();
        //event(new OrderEvent($this->kitchenService));

        return redirect()->route('home');
    }
}
