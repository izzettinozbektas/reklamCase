<?php

namespace App\Services\Repositories;

use App\Models\Advertising;
use App\Models\Platform;
use App\Services\Interfaces\ReportInterface;

class ReportRepository implements ReportInterface
{
    public function getPlatformProfit($request,$id): array
    {
         return Platform::with(['getAdvertisings','getTransactions'])->find($id)->toArray();
    }
    public function getAllAdvertisingProfit($request): array
    {
        $limit = $request->get('limit') ?? 3;
        return Advertising::with(['getPlatforms'])->paginate($limit)->toArray();
    }
}
