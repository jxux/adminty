<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  App\Http\Data\ServiceData;

class ServiceController extends Controller{
    
    public function service($type, $number){
        return ServiceData::service($type, $number);
    }
}
