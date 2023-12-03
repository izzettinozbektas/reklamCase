<?php

namespace App\Http\Controllers;

use App\Requests\PlatformRequest;
use App\Resources\PlatformResource;
use App\Response\Response;
use App\Services\Interfaces\PlatformInterface;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function __construct(protected PlatformInterface $repository,protected Response $response)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->response->sendPaginateResponse(new PlatformResource($this->repository->getAllPlatform($request)));
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
    public function store(PlatformRequest $request)
    {
        $data = $request->all();
        $this->repository->platformCreate($data);
        return $this->response->sendResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->response->sendResponse( new PlatformResource( $this->repository->getPlatform($id)) );
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
    public function update(PlatformRequest $request, string $id)
    {
        $data = $request->all();
        $this->repository->platformUpdate($data,$id);
        return $this->response->sendResponse();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->platformDelete($id);
        return $this->response->sendResponse();
    }
}
