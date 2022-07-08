<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class MarketService
{
    use ConsumeExternalService;
    
    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.market.base_uri');
        $this->secret = config('services.market.secret');
    }

    public function buyIngredient($ingredient)
    {
        return $this->performRequest('GET', "/buy/{$ingredient}");
    }

    
}