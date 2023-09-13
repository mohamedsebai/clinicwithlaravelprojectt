<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::paginate(2);

        return view('admin.cities.city_list',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.add_city');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {

        City::create([
            'city_name' => $request->input('city_name'),
        ]);

        return redirect()->route('cities.create')->with('success', 'data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(City $city)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('admin.cities.update_city',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, City $city)
    {

        //
        City::where('id', $city->id)->update([
            'city_name' => $request->input('city_name'),
        ]);

        return  redirect()->route('cities.edit', $city->id)->with('success', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        City::where('id', $city->id)->delete();
        return  redirect()->route('cities.index')->with('success', 'data deleted successfully');
    }
}
