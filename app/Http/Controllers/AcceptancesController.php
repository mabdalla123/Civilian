<?php

namespace App\Http\Controllers;

use App\Http\Requests\Acceptances\StoreAcceptancesRequest;
use App\Http\Requests\Acceptances\UpdateAcceptancesRequest;
use App\Models\Acceptances;
use App\Models\City;
use Exception;

class AcceptancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Acceptances = Acceptances::all();
        return view('admin.Acceptances.index', compact('Acceptances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $cities = City::all();
        return view('Admin.Acceptances.Create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAcceptancesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcceptancesRequest $request)
    {
        try {

            $Filename = time() . '.' . $request->file('image_path')->extension();
            $request->file('image_path')->move(public_path('Acceptance'), $Filename);
            #copy request Data To a variable so we can overwrite image path Data
            $requestData = $request->all();
            $requestData['image_path'] = $Filename;

            Acceptances::create($requestData);

            return redirect()->route('Acceptances.index')->with('toast_success', 'Acceptance Updated Succesfuly!');
        } catch (Exception $ex) {

            return redirect()->route('Acceptances.create')->with('toast_error', 'Error Creating  new Acceptance!');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acceptances  $acceptances
     * @return \Illuminate\Http\Response
     */
    public function show(Acceptances $Acceptance)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acceptances  $acceptances
     * @return \Illuminate\Http\Response
     */
    public function edit(Acceptances $Acceptance)
    {
        //
        $cities = City::all();
        return view('admin.Acceptances.Edit', compact('Acceptance', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcceptancesRequest  $request
     * @param  \App\Models\Acceptances  $acceptances
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcceptancesRequest $request, Acceptances $Acceptance)
    {
        try {

            if ($request->hasFile('image_path')) {
                //upload File
                //dd($request);
                $Filename = time() . '.' . $request->file('image_path')->extension();
                $request->file('image_path')->move(public_path('Acceptance'), $Filename);
                //dd($name);
                $Acceptance->update($request->except(['image_path']));
                $Acceptance->image_path = $Filename;
                $Acceptance->update();

            } else {
                $Acceptance->update($request->except(['image_path']));

            }
            return redirect()->route('Acceptances.index')->with('toast_success', ' Acceptance Updated Succesfuly!');

        } catch (Exception $ex) {
            dd($ex);
            return redirect()->route('Acceptances.show', ['Acceptance' => $Acceptance])->with('toast_error', 'Error Updating  Acceptances!');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acceptances  $acceptances
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acceptances $Acceptance)
    {
        try {
            $Acceptance->delete();
            return redirect()->route('Acceptances.index')->with('toast_success', 'City Is Deleted  Succesfuly!');
        } catch (Exception) {
            return redirect()->route('Acceptances.index')->with('toast_error', 'Error Deleting  Acceptances!');

        }
    }
}
