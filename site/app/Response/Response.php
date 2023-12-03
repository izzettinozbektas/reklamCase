<?php

namespace App\Response;

class Response
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result =[])
    {
        $response = [
            'isSuccess' => true,
            'data'      => $result,
        ];
        return response()->json($response, 200);
    }
    public function sendPaginateResponse($result =[])
    {

        $response = [
            'isSuccess'         => true,
            'data'              => $result['data'],
            'current_page'      => $result['current_page'],
            'total'             => $result['total']
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($errorMessages = [], $code = 404)
    {
        $response = [
            'isSuccess' => false,
            'message' => $errorMessages
        ];
        return response()->json($response, $code);
    }
}
