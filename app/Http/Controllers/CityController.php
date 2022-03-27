<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\CreateCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\Models\City;
use App\Policies\CityPolicy;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.City.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.City.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCityRequest $request)
    {
        try{
        City::Create($request->all());
        return redirect()->route('cities.index')->with('toast_success', 'New City Is Created!');;

        }catch(Exception){
            return redirect()->route('cities.index')->with('toast_error', 'Error Creating new City');;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('admin.City.Edit', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        try{
        $city->update($request->all());
        return redirect()->route('cities.index')->with('toast_success', 'City Is Updated!!!');;

        }catch(Exception){
            return redirect()->route('cities.index')->with('toast_error', 'Sorry Error Editing a City!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //check if City used in Acceptances before delete ---to do
       

            try {
                $city->delete();
                return redirect()->route('cities.index')->with('toast_success', 'City Is Deleted!!!');;
            } catch (Exception) {
                //cant be deleted ,associated with othe Table
                return redirect()->route('cities.index')->with('toast_error', 'Error Deleteing a City!!!');
            }
        

    }

}
