<?php

namespace App\Traits;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Response as HttpResponse;

trait ApiResponser
{
    /**
     * Build success(200) repsonse
     * @param string|array $data
     * @param int $code
     * @return Illuminate\Http\Response
     */
    public function successResponse($data, $code = HttpResponse::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build error(n) repsonse
     * @param string|array $data
     * @param int $code
     * @return Illuminate\Http\Response
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Build errorMessage(n) repsonse
     * @param string|array $data
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}