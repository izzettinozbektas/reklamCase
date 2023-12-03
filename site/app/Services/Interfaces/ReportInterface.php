<?php

namespace App\Services\Interfaces;



interface ReportInterface
{
    public function getPlatformProfit($request,$id):array;
    public function getAllAdvertisingProfit($request):array;
}
