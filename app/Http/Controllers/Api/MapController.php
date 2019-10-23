<?php

namespace App\Http\Controllers\Api;

use App\Map;
use App\Device;
use Illuminate\Http\Request;

class MapController extends BaseController
{   
    public function store(Request $request)
    {   
        $device = Device::firstOrCreate(
            ['name' => $request->device]
        );

        Map::create([
            'device_id'=>$device->id,
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'intoxicant_level'=>$request->intoxicant_level
        ]);
        return $this->sendResponse();
    }
}
