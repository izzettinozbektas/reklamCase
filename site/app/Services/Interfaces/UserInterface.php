<?php

namespace App\Services\Interfaces;


interface UserInterface
{
    public function users($request): array;
    public function update($request,$id):bool;
    public function userCreate($userRequest): bool;
    public function assignRoleToUser($userRequest,$id): bool;
    public function revokeRole($userRequest,$id): bool;

}
