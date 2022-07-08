<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class KitchenService
{
    use ConsumeExternalService;
    
    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.kitchen.base_uri');
        $this->secret = config('services.kitchen.secret');
    }

    public function setOrder()
    {
        return $this->performRequest('POST', "/set");
    }

    public function getStatus($date, $limit = 0)
    {
        return $this->performRequest('GET', $limit > 0? "/status/{$date}/{$limit}" : "/status/{$date}");
    }

    public function getMenu()
    {
        return $this->performRequest('GET', "/menu");
    }
    
}