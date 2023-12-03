<?php

namespace App\Http\Controllers;

use App\Requests\UserRequest;
use App\Requests\UserRoleAddOrRevokeRequest;
use App\Resources\UserResource;
use App\Response\Response;
use App\Services\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $repository;
    protected $response;
    public function __construct(UserInterface $repository, Response $response)
    {
        $this->repository = $repository;
        $this->response   = $response;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->response->sendPaginateResponse( new  UserResource($this->repository->users($request)));
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
    public function store(Request $request)
    {
        return $this->response->sendResponse($this->repository->userCreate($request));
    }
    public function userDetailStore(Request $request){
        return $this->response->sendResponse($this->repository->userDetailCreate($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->response->sendResponse( new UserResource($this->repository->getUser($id)));
    }
    public function getEmailToUserId(string  $email){
        return $this->repository->getEmailToUser($email);
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
        return $this->response->sendResponse($this->repository->update($request->all(),$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function assignRole(UserRoleAddOrRevokeRequest $request,$id){
        $this->revokeRole($request,$id);
        $this->repository->assignRoleToUser($request,$id);
        return $this->response->sendResponse();
    }
    public function revokeRole(UserRoleAddOrRevokeRequest $request,$id){
        $this->repository->revokeRole($request,$id);
        return $this->response->sendResponse();
    }
    public function userSearch(Request $request){
        if(empty($request->get('q'))){
            return $this->response->sendError('arama anahtarı boş olamaz',"200");
        }
        return $this->response->sendResponse( new UserSearchResource($this->repository->userSearch($request)));
    }
    public function userToBrand($brands,$id){
        return $this->response->sendResponse($this->repository->userToBrands($brands,$id));
    }
    public function userInfo(){
        $user = Auth::user();
        $data['username']           = $user->username;
        $data['name']               = $user->name;
        $data['surname']            = $user->surname;
        $data['email']              = $user->email;
        $data['role_list']          = $user->getRole();
        $data['permission_list']    = $user->getPermission();
        return $this->response->sendResponse( new UserResource($data));
    }

}
