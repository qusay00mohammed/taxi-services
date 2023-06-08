<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::select(['*'])->orderBy('id', 'desc')->paginate(5);
        return view('admin.cities.cities', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.add_city');
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
                'name' => 'bail | required | unique:cities',
                'price' => 'required | integer | max:30000',
            ]
        );
        $input['regStatus'] = 1;
        $city = City::create($input);
        if ($city) {
            return redirect()->route('cities.index')->withSuccess('City was created successfully');
        } else {
            return redirect()->route('cities.index')->withError('City not created successfully');
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
        $city = City::findOrFail($id);
        $activate['regStatus'] = 1;
        $cityActive = $city->update($activate);

        if ($cityActive) {
        return redirect()->back()->withSuccess('Activate city successfully');
        } else {
        return redirect()->back()->withError('Not activate city successfully');
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
        $city = City::findOrFail($id);
        return view('admin.cities.edit_city', compact('city'));
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
         $city = City::findOrFail($id);
         $input = $request->all();
         $request->validate([
            'name' => 'bail | required | unique:taxis,vehicleType,' . $id,
            'price' => 'required | integer | max:30000',
            'groupId'  => 'required',
         ]);
         $input['regStatus'] = $request->groupId;

         $cityUpdate = $city->update($input);

         if ($cityUpdate) {
             return redirect()->route('cities.index')->withSuccess('City was updated successfully');
         } else {
             return redirect()->route('cities.index')->withError('City not updated successfully');
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
        $city = City::findOrFail($id)->delete();
        if ($city) {
            return redirect()->back()->withSuccess('City was deleted successfully');
        } else {
            return redirect()->back()->withError('City not updated successfully');
        }
    }
}
