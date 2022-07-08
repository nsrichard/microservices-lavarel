<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Menu;

class MenuController extends Controller
{

    use ApiResponser;

    public function __construct()
    {
    }

    public function index()
    {
        $data = Menu::with('recipes')->get();
        
        return $this->successResponse($data);
    }

}
