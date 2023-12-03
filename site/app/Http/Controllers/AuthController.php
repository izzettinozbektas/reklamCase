<?php

namespace App\Http\Controllers;

use App\Requests\AuthRequest;
use App\Requests\UserRequest;
use App\Resources\AuthResource;
use App\Services\Interfaces\UserInterface;
use Illuminate\Support\Facades\Auth;
use App\Response\Response;
class AuthController extends Controller
{
    protected $response;
    protected $repository;
    public function __construct(Response $response, UserInterface $repository)
    {
        $this->response = $response;
        $this->repository = $repository;
    }

    // geçici olarak
    public function register(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $this->repository->userCreate($request);
        return ["success" => "oldu"];
    }

    public function login(AuthRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $response['tokenType'] =  "Bearer Token";
            $response['token'] =  $user->createToken('MyApp')->accessToken;
            return $this->response->sendResponse(new AuthResource($response));
        } else{
            return $this->response->sendError("Kullanıcı Bulunamadı",401);
        }
    }
    public function logouth(){
        $user = Auth::user()->token()->revoke();
        return true;
    }
}
