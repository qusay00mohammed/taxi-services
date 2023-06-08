<?php

namespace App\Http\Controllers;

use App\Models\Taxi;
use Illuminate\Http\Request;

class TaxiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxis = Taxi::select(['*'])->orderBy('id', 'desc')->get();
        return view('admin.taxis.taxis', compact('taxis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.taxis.add_taxi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate(
            [
                'vehicleType' => 'bail | required | unique:taxis',
                'numOfPeople'    => 'required | integer | max:99',
                'price' => 'required | integer | max:999',
            ]
        );
        $input['regStatus'] = 1;
        $taxi = Taxi::create($input);
        if ($taxi) {
            return redirect()->route('taxis.index')->withSuccess('Taxi was created successfully');
        } else {
            return redirect()->route('taxis.index')->withError('Taxi not created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxi = Taxi::findOrFail($id);
        $activate['regStatus'] = 1;
        $taxiActive = $taxi->update($activate);

        if ($taxiActive) {
        return redirect()->back()->withSuccess('Activate taxi successfully');
        } else {
        return redirect()->back()->withError('Not activate taxi successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxi = Taxi::findOrFail($id);
        return view('admin.taxis.edit_taxi', compact('taxi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $taxi = Taxi::findOrFail($id);
         $input = $request->all();

         $request->validate([
            'vehicleType' => 'bail | required | unique:taxis,vehicleType,' . $id,
            'numOfPeople'    => 'required | integer | max:99',
            'price' => 'required | integer | max:999',
            'groupId'  => 'required',
         ]);
         $input['regStatus'] = $request->groupId;

         $taxiUpdate = $taxi->update($input);

         if ($taxiUpdate) {
             return redirect()->route('taxis.index')->withSuccess('Taxi was updated successfully');
         } else {
             return redirect()->route('taxis.index')->withError('Taxi not updated successfully');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taxi = Taxi::findOrFail($id)->delete();
        if ($taxi) {
            return redirect()->back()->withSuccess('Taxi was deleted successfully');
        } else {
            return redirect()->back()->withError('Taxi not updated successfully');
        }
    }
}
