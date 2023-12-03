<?php

namespace App\Services\Interfaces;

use App\Requests\PermissionRequest;

interface PermissionInterface
{
    public function permissionCreate(PermissionRequest $permissionRequest): bool;
    public function getPermissions(): array;
}
