<?php

namespace App\Http\Controllers;

use App\Helpers\CalculationHelper;
use App\Resources\ReportResource;
use App\Response\Response;
use App\Services\Interfaces\ReportInterface;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct(protected ReportInterface $repository,  protected  Response $response)
    {
    }
    /**
     * @OA\Get(
     *     path="/api/getPlatformProfit/{id}",
     *     tags={"getPlatformProfit"},
     *     summary="Test",
     *
     *     @OA\Parameter(
     *          name="id",
     *          description="Platform id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *     @OA\Response(
     *         response="200",
     *         description="Lorem",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function getPlatformProfit(Request $request,$id)
    {
        $datas = $this->repository->getPlatformProfit($request,$id);
        foreach ($datas['get_transactions'] as $key => $data){
            $datas['get_transactions'][$key]['tbm'] = CalculationHelper::tbmCalculate($data['spend'],$data['clicks']);
            $datas['get_transactions'][$key]['cpi'] = CalculationHelper::cpiCalculate($data['spend'],$data['impressions']);
            $datas['get_transactions'][$key]['roi'] = CalculationHelper::roiCalculate($data['revenue'],$data['spend']);
        }
        return $this->response->sendResponse( new ReportResource($datas));
    }
    /**
     * @OA\Get(
     *     path="/api/getAllAdvertisingProfit",
     *     tags={"getPlatformProfit"},
     *     summary="Test",
     *
     *     @OA\Response(
     *         response="200",
     *         description="Lorem",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function getAllAdvertisingProfit(Request $request)
    {
        $datas = $this->repository->getAllAdvertisingProfit($request);
        return $this->response->sendPaginateResponse(new ReportResource($datas));
    }
}
