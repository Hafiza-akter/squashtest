<?php


namespace App\Http\Controllers\api\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\AirShoppingRequest;
use App\Services\v1\AirShoppingService;


class AirShoppingController extends Controller
{
    /**
     * __invoke
     *
     * @param  mixed $request
     * @return void
     */
    public function __invoke(AirShoppingRequest $request)
    {
        try {
            $this->logHttpRequest(__FILE__, __LINE__, __FUNCTION__);
            $airShoppingService = new AirShoppingService($request);
            $response = $airShoppingService->getResponse();
        } catch (\Throwable $th) {
            $response = $this->getErrorLog($th);
        } finally {
            $this->getResult($response, __FILE__, __LINE__, __FUNCTION__);
            $statusCode = $response->status_code;
            if (!property_exists($response, "err_msg")) {
                unset($response->status_code);
            }


            return response()->json($response, $statusCode);
        }
    }
}
