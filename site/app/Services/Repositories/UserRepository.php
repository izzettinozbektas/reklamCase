<?php

namespace App\Services\Repositories;

use App\Models\User;
use App\Models\UserDetail;
use App\Services\Interfaces\UserInterface;


class UserRepository implements UserInterface
{
    /**
     * status = 0 pasif
     * status = 1 aktif
     * status = 2 denemesürecinde
    */
    public function users($request): array
    {
        $model = new User();
        $limit =  $request->get('limit') ?? 10;
        return $model->paginate($limit,['name','email'])->toArray();

    }

    public function userCreate($userRequest): bool
    {
        $user = User::create($userRequest->all());
        // default user Role
        $user->assignRole(['role' => ['user']]);
        //marka ilişkisi
        $this->userToBrands($userRequest->brands,$user->id);
        // marka ilişkisi
        return  true;
    }

    public function assignRoleToUser($userRequest,$id): bool
    {
        User::find($id)->assignRole($userRequest->role);
        return true;
    }
    public function revokeRole($userRequest, $id): bool
    {
        $user = User::find($id);
        foreach ($user->getRole() as $role){
            $user->removeRole($role);
        }
        return true;
    }

    public function update($request, $id): bool
    {
        User::find($id)->update($request);
        return true;
    }

}
