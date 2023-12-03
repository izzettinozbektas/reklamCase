<?php

namespace App\Services\Interfaces;

use App\Requests\RoleRequest;

interface RoleInterface
{
    public function getRoles(): array;
    public function roleCreate(RoleRequest $roleRequest): int;
    public function roleUpdate(RoleRequest $roleRequest,$id): bool;
    public function roleGivePermissionTo(RoleRequest $roleRequest,$id): bool;
    public function revokeRoleToPermission($id): bool;
    public function deleteRole($id): bool;
    public function getRole($id): array;
}
