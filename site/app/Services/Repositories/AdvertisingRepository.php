<?php

namespace App\Services\Repositories;

use App\Models\Advertising;
use App\Services\Interfaces\AdvertisingInterface;

class AdvertisingRepository implements AdvertisingInterface
{
    public function getAlladvertising($request): array
    {
        $limit =  $request->get('limit') ?? 5;
        return Advertising::paginate($limit)->toArray();
    }

    public function advertisingCreate($data): bool
   {
       Advertising::create($data);
       return true;
   }
   public function getadvertising($q,$field = "id"): array
   {
       return Advertising::where($field,$q)->first()->toArray();
   }
   public function advertisingUpdate($data,$id): bool
   {
       Advertising::find($id)->update($data);
       return true;
   }
   public function advertisingDelete($id): bool
   {
       Advertising::find($id)->delete();
       return true;
   }
}
