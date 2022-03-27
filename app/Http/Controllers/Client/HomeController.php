<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Acceptances;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $Acceptances  = Acceptances::all();
        return view('Client.index',compact('Acceptances'));
    } 
}
