<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(){
        
        $status = Status::latest()->paginate(20);

        return view('status.index',compact('status')); 
    }
}