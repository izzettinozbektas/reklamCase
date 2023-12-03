<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;



class Handler extends ExceptionHandler
{
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];


    /**
     * @param Throwable $e
     * @return void
     * @throws Throwable
     */
    public function report(Throwable $e)
    {
        return parent::report($e);
    }



    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $rendered = parent::render($request, $exception);
        $error = [
            'message' => $exception->getMessage(),
            'line'=>$exception->getLine(),
            'file'=>$exception->getFile(),
            'code'=>$exception->getCode(),
        ];


        return response()->json([
            'isSuccess' =>false,
            'message'   =>$exception->getMessage(),
            'errors'    =>$error
        ], $rendered->getStatusCode());
    }
}
