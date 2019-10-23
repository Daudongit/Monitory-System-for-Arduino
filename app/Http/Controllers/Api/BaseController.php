<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result=[], $code = 200, $message='ok')
    {
    	$response = [
            'success' => true,
            'message' => $message
        ];

        if(!empty($result)){
            $response['data'] = $result;
        }

        return response()->json($response, $code);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error,$code = 404)
    {
    	$response = [
            'success' => false,
            'error' => $error,
        ];

        return response()->json($response, $code);
    }

}