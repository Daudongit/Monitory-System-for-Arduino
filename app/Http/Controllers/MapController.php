<?php

namespace App\Http\Controllers;

use App\Map;
use App\Device;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index($device = 0){
        // Log::info('log from index');
        // dd($device);
        $maps = $device==0?Map::paginate(20):
            Map::where('device_id',$device)->paginate(20);

        if($device == 0)
	    {
            $activeDevice = new \stdClass;
            $activeDevice->id = 0;
            $activeDevice->name = 'All';
	    }
	    else
	    {
            $activeDevice = Device::find($device)->first();
        }
        
        $devices = Device::all();

        return view(
            'map.index',
            compact('maps','activeDevice','devices')
        );
    }


    public function store()
	{	
		// $to_save['longitude'] = $this->input->post_get('longitude');

		// $to_save['latitude'] = $this->input->post_get('latitude');

		// $to_save['intoxicant_level'] = $this->input->post_get('intoxicant_level');

		// $to_save['date'] = date('d/m/Y H:i:s');

		// $device_name = $this->input->post_get('id');

		// $device = $this->device->getWhere(['name'=>$device_name]);

		// if(count($device) == 0)
		// {	
		// 	$to_save['device_id'] = $this->device->insert(['name'=>$device_name]);
		// }
		// else
		// {	
		// 	$to_save['device_id'] = $device[0]->id;
		// }

	    // $this->map->insert($to_save);

	    // echo 1;

	    // exit();
	}
}
