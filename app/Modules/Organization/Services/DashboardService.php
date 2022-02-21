<?php

namespace App\Modules\Organization\Services;

class DashboardService
{
    private $companyId = '';

    public function __construct()
    {
    }

    public function view(array $params)
    {
        if ($params['company'] != '')
            $this->companyId = $params['company'];
        
            
        $test = array();

        return $test;

    }
}