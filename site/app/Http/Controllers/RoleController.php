<?php

namespace App\Http\Controllers;


use App\Requests\RoleRequest;
use App\Resources\RoleResource;
use App\Response\Response;
use App\Services\Interfaces\RoleInterface;

class RoleController extends Controller
{
    protected $repository;
    protected $response;
    public function __construct(Response $response, RoleInterface $repository)
    {
        $this->repository = $repository;
        $this->response   = $response;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response->sendResponse(new RoleResource($this->repository->getRoles()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role_id = $this->repository->roleCreate($request);
        $this->repository->roleGivePermissionTo($request,$role_id);
        return $this->response->sendResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->response->sendResponse(new RoleResource($this->repository->getRole($id)));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $this->repository->roleUpdate($request,$id);
        $this->revokeRoleToPermission($id);
        $this->assignPermissionToRole($request,$id);
        return $this->response->sendResponse();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $control =$this->repository->deleteRole($id);
        if($control){
           return $this->response->sendResponse();
        }
        return $this->response->sendError('Role kullanılıyorken silinemez',200);
    }
    /**
     * assigin permission to role
     */
    public function assignPermissionToRole(RoleRequest $request, string $id)
    {
        $this->repository->roleGivePermissionTo($request,$id);
        return $this->response->sendResponse();
    }
    /**
     * assigin permission to role
     */
    public function revokeRoleToPermission(string $id)
    {
        $this->repository->revokeRoleToPermission($id);
        return $this->response->sendResponse();
    }
}
