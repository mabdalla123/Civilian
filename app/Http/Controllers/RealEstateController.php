<?php

namespace App\Http\Controllers;

use App\Http\Requests\RealEstate\StoreRealEstateRequest;
use App\Http\Requests\RealEstate\UpdateRealEstateRequest;
use App\Models\RealEstate;
use App\Models\RealEstateType;
use Exception;
use Illuminate\Support\Facades\DB;

class RealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realestates = RealEstate::all();
        return view('Admin.RealEstate.index', compact('realestates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $realestatetypes = RealEstateType::all();
        return view('Admin.RealEstate.Create', compact('realestatetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRealEstateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealEstateRequest $request)
    {
        try {
            DB::beginTransaction();
            $inserted = RealEstate::create($request->except(['files']));

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    //reaname and move File
                    $Filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('RealEstateFiles'), $Filename);
                    //insert to Database
                    $inserted->files()->create([
                        'file_name'=>$file->getClientOriginalName(),
                        'file_path' => $Filename,
                    ]);

                };
            }
            DB::commit();
            return redirect()->route('realestate.index')->with('toast_success', 'Added new RealEstate');

        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('realestate.create')->with('toast_error', 'Error Adding new RealEstate!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */
    public function show(RealEstate $realEstate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */
    public function edit(RealEstate $realestate)
    {
        $realestatetypes = RealEstateType::all();
        return view('Admin.RealEstate.Edit', compact('realestate', 'realestatetypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRealEstateRequest  $request
     * @param  \App\Models\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealEstateRequest $request, RealEstate $realestate)
    {
        //
        try {
            DB::beginTransaction();
            $realestate->update($request->validated());

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    //reaname and move File
                    $Filename = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('RealEstateFiles'), $Filename);
                    //insert to Database
                    $realestate->files()->create([
                        'file_name'=>$file->getClientOriginalName(),
                        'file_path' => $Filename,
                    ]);

                };
            }
            DB::commit();
            return redirect()->route('realestate.index')->with('toast_success', 'RealEstate is updated!');

        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('realestate.edit',compact('$realestate'))->with('toast_error', 'Error Updating  RealEstate!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealEstate  $realEstate
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstate $realEstate)
    {
        //
    }
}
