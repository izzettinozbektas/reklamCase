<?php

namespace App\Services\Repositories;

use App\Models\Platform;
use App\Services\Interfaces\PlatformInterface;

class PlatformRepository implements PlatformInterface
{
    public function getAllPlatform($request): array
    {
        $limit =  $request->get('limit') ?? 5;
        return Platform::paginate($limit)->toArray();
    }

    public function platformCreate($data): bool
   {
       Platform::create($data);
       return true;
   }
   public function getPlatform($q,$field = "id"): array
   {
       return Platform::where($field,$q)->first()->toArray();
   }
   public function platformUpdate($data,$id): bool
   {
       Platform::find($id)->update($data);
       return true;
   }
   public function platformDelete($id): bool
   {
       Platform::find($id)->delete();
       return true;
   }
}
