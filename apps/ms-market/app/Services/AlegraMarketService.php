<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AlegraMarketService
{
    use ConsumeExternalService;
    
    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.alegra.base_uri');
        $this->secret = config('services.alegra.secret');
    }

    public function buyIngredient($ingredient)
    {
        return $this->performRequest('GET', "/api/farmers-market/buy?ingredient={$ingredient}");
    }

    
}