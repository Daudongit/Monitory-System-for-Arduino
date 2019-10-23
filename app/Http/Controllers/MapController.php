<?php

namespace App\Http\Controllers;

use App\Map;
use App\Device;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Device $device){
        $maps = $device->id == 0?Map::latest():
            Map::where('device_id',$device->id)->latest();

        $activeDevice = $device;
        $devices = Device::all();
		$maps = $maps->paginate(20);
        return view(
            'map.index',
            compact('maps','activeDevice','devices')
        );
    }
}
