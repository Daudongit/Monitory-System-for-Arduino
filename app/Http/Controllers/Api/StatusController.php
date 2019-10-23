<?php

namespace App\Http\Controllers\Api;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends BaseController
{   
    public function store(Request $request)
    {   
        Status::create([
            'status'=>$request->status
        ]);
        return $this->sendResponse();
    }
}