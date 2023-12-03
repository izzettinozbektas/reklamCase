<?php

namespace App\Http\Controllers;

use App\Requests\PermissionRequest;
use App\Resources\AuthResource;
use App\Resources\PermissionResource;
use App\Response\Response;
use App\Services\Interfaces\PermissionInterface;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $repository;
    protected $response;
    public function __construct(Response $response, PermissionInterface $repository)
    {
        $this->repository = $repository;
        $this->response   = $response;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response->sendResponse(new PermissionResource($this->repository->getPermissions()));
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
    public function store(PermissionRequest $request)
    {
        $this->repository->permissionCreate($request);
        return $this->response->sendResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
    }
}
