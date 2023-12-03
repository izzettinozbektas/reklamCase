<?php

namespace App\Helpers;

class CalculationHelper
{
    public static function tbmCalculate(float $spend,int $clicks)
    {
        return $spend / $clicks;
    }
    public static function cpiCalculate(float $spend,int $impressions)
    {
        return $spend / $impressions;
    }
    public static function roiCalculate(float $revenue,float $spend)
    {
        return ($revenue-$spend) / $spend % 100;
    }
}
