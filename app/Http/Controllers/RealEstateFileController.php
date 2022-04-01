<?php

namespace App\Http\Controllers;

use App\Models\RealEstateFile;
use App\Http\Requests\RealEstate\StoreRealEstateFileRequest;
use App\Http\Requests\RealEstate\UpdateRealEstateFileRequest;
use Exception;

class RealEstateFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRealEstateFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealEstateFileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealEstateFile  $realEstateFile
     * @return \Illuminate\Http\Response
     */
    public function show(RealEstateFile $realEstateFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealEstateFile  $realEstateFile
     * @return \Illuminate\Http\Response
     */
    public function edit(RealEstateFile $realEstateFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRealEstateFileRequest  $request
     * @param  \App\Models\RealEstateFile  $realEstateFile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealEstateFileRequest $request, RealEstateFile $realEstateFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealEstateFile  $realEstateFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstateFile $realEstateFile)
    {
        
        try{
            //check if parent has other file ,dont delete if this is the only one

            $realestate = $realEstateFile->realestate;
            $realEstateFile->delete();
            return redirect()->route('realestate.edit',['realestate'=>$realestate])->with('toast_success', 'File Is Deleted!');
            
        } catch (Exception $e) {
            return redirect()->route('realestate.edit')->with('toast_error', 'Error deleting File!');
        }
    }
}
