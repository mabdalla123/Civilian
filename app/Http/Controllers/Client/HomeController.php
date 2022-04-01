<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Acceptances;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $Acceptances  = Acceptances::all();
        $realestates = RealEstate::all();
        return view('Client.index',compact('Acceptances','realestates'));
    } 
}
