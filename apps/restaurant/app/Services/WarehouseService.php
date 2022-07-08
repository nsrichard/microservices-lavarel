<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class WarehouseService
{
    use ConsumeExternalService;
    
    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.warehouse.base_uri');
        $this->secret = config('services.warehouse.secret');
    }

    public function getStock()
    {
        return $this->performRequest('GET', "/ingredient");
    }
    
}