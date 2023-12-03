<?php

namespace App\Http\Controllers;

use App\Requests\AdvertisingRequest;
use App\Resources\AdvertisingResource;
use App\Response\Response;
use App\Services\Interfaces\AdvertisingInterface;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{

    public function __construct(protected AdvertisingInterface $repository,protected Response $response)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->response->sendPaginateResponse(new AdvertisingResource($this->repository->getAlladvertising($request)));
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
    public function store(AdvertisingRequest $request)
    {
        $data = $request->all();
        $this->repository->advertisingCreate($data);
        return $this->response->sendResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->response->sendResponse( new AdvertisingResource( $this->repository->getadvertising($id)) );
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
    public function update(AdvertisingRequest $request, string $id)
    {
        $data = $request->all();
        $this->repository->advertisingUpdate($data,$id);
        return $this->response->sendResponse();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->advertisingDelete($id);
        return $this->response->sendResponse();
    }
}
