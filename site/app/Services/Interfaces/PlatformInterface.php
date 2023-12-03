<?php

namespace App\Services\Interfaces;



interface PlatformInterface
{
    public function getAllPlatform($request):array;
    public function platformCreate($data):bool;
    public function getPlatform($q,$field): array;
    public function platformUpdate($data,$id):bool;
    public function platformDelete($id):bool;
}
