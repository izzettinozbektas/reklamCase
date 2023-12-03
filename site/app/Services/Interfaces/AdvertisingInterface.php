<?php

namespace App\Services\Interfaces;



interface AdvertisingInterface
{
    public function getAlladvertising($request):array;
    public function advertisingCreate($data):bool;
    public function getadvertising($q,$field): array;
    public function advertisingUpdate($data,$id):bool;
    public function advertisingDelete($id):bool;
}
