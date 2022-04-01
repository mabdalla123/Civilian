<?php

namespace App\Http\Controllers;

use App\Http\Requests\RealEstate\StoreRealEstateTypeRequest;
use App\Http\Requests\RealEstate\UpdateRealEstateTypeRequest;
use App\Models\RealEstateType;
use Exception;

class RealEstateTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realestatetypes = RealEstateType::all();
        return view('Admin.RealEstateTypes.index', compact('realestatetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.RealEstateTypes.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRealEstateTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealEstateTypeRequest $request)
    {
        try {
            RealEstateType::create($request->validated());
            return redirect()->route('realestatetypes.index')->with('toast_success', 'New Type Is Created!');

        } catch (Exception) {
            return redirect()->route('realestatetypes.create')->with('toast_error', 'Error Creating new Type!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealEstateType  $realEstateType
     * @return \Illuminate\Http\Response
     */
    public function show(RealEstateType $realEstateType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealEstateType  $realEstateType
     * @return \Illuminate\Http\Response
     */
    public function edit(RealEstateType $realestatetype)
    {
        return view('Admin.RealEstateTypes.Edit', compact('realestatetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRealEstateTypeRequest  $request
     * @param  \App\Models\RealEstateType  $realEstateType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealEstateTypeRequest $request, RealEstateType $realEstateType)
    {
        try {
            $realEstateType->update($request->validated());
            return redirect()->route('realestatetypes.index')->with('toast_success', 'Type Is Updated!');

        } catch (Exception) {
            return redirect()->route('realestatetypes.edit')->with('toast_error', 'Error Updating Type!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealEstateType  $realEstateType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstateType $realestatetype)
    {
        try{
        $realestatetype->delete();
        return redirect()->route('realestatetypes.index')->with('toast_success', 'Type Is Deleted!');;

        }catch(Exception){
            return redirect()->route('realestatetypes.index')->with('toast_error', 'Error Deleting Type!');;
        }
    }
}
