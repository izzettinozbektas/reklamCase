<?php

namespace App\Observers;

use App\Models\Platform;
use App\Models\PlatformTransaction;

class PlatformTransactionObserver
{
    /**
     * Handle the PlatformTransaction "created" event.
     */
    public function created(PlatformTransaction $platformTransaction): void
    {
            $platformId = $platformTransaction['platform_id'];
            $platfom = Platform::find($platformId);
            $data['remainder'] = $platfom['remainder'] - $platformTransaction['spend'];
            $platfom->update($data);
    }

    /**
     * Handle the PlatformTransaction "updated" event.
     */
    public function updated(PlatformTransaction $platformTransaction): void
    {
        //
    }

    /**
     * Handle the PlatformTransaction "deleted" event.
     */
    public function deleted(PlatformTransaction $platformTransaction): void
    {
        //
    }

    /**
     * Handle the PlatformTransaction "restored" event.
     */
    public function restored(PlatformTransaction $platformTransaction): void
    {
        //
    }

    /**
     * Handle the PlatformTransaction "force deleted" event.
     */
    public function forceDeleted(PlatformTransaction $platformTransaction): void
    {
        //
    }
}
