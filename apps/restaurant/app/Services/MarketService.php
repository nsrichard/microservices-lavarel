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

    public function getHistory($date, $limit = 0)
    {
        return $this->performRequest('GET', $limit > 0? "/history/{$date}/{$limit}" : "/history/{$date}");
    }

    
}