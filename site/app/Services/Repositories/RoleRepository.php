<?php

namespace App\Services\Repositories;

use App\Requests\RoleRequest;
use App\Services\Interfaces\RoleInterface;
use App\Models\Role;

class RoleRepository implements RoleInterface
{
    public function getRoles(): array
    {
        return Role::with('permissions')->get()->toArray();

    }

    public function roleCreate(RoleRequest $roleRequest): int
    {
        return Role::create($roleRequest->all())->id;

    }
    public function roleUpdate(RoleRequest $roleRequest,$id): bool
    {
        $data = $roleRequest->all();
        unset($data['permission']);
        Role::where('id',$id)->update($data);
        return true;
    }

    public function roleGivePermissionTo(RoleRequest $roleRequest,$id): bool
    {
        $role = Role::find($id);
        unset($roleRequest->name,$roleRequest->guard_name);
        $role->givePermissionTo($roleRequest->permission);
        return true;
    }
    public function revokeRoleToPermission($id): bool
    {

        $role = Role::find($id);
        foreach ($role->permissions->toArray() as $permissionId){
            $role->revokePermissionTo($permissionId['id']);
        }
        return true;
    }
    public function deleteRole($id): bool
    {
        $usingRole = Role::find($id);
        if(empty($usingRole->users->toArray())){
            $usingRole->delete();
            return  true;
        }
        return false;
    }
    public function getRole($id): array
    {
        return Role::with('permissions')->find($id)->toArray();
    }
}
