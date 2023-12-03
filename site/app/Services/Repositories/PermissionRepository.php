<?php

namespace App\Services\Repositories;

use App\Models\Permission;
use App\Requests\PermissionRequest;
use \App\Services\Interfaces\PermissionInterface;
class PermissionRepository implements PermissionInterface
{
    /**
     * @param PermissionRequest $permissionRequest
     * @return bool
     */
    public function permissionCreate(PermissionRequest $permissionRequest): bool
    {
        Permission::create($permissionRequest->all());
        return  true;
    }

    public function getPermissions(): array
    {
        return Permission::all()->toArray();
    }
}
