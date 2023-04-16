<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    /**
     * @param $message
     * @return array
     */
    public function sendSuccess($message)
    {
        return [
            'success' => true,
            'message' => $message,

        ];
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($message)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], 400);
    }

    /**
     * @param $data
     * @param $message
     * @return array
     */
    public function sendData($data, $message)
    {
        return [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];
    }

}
