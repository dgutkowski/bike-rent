<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\BikeCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBikeRequest;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {     
        return view('bikes.index', [
            'bikes' => Bike::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bikes.create', [
            'categories' => BikeCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBikeRequest $request)
    {
        
        $bike = new Bike($request->validated());
        if($request->hasFile('image')) {
            $bike->image_path = $request->file('image')->store('bikes');
        }
        $bike->save();
        return redirect(route('bikes.index'))->with('status', "Rekord został dodany");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        return view("bikes.show", [
            'bike' => $bike
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike)
    {
        return view("bikes.edit", [
            'bike' => $bike,
            'categories' => BikeCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreBikeRequest  $request
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBikeRequest $request, Bike $bike)
    {
        $bike->fill($request->validated());
        if($request->hasFile('image')) {
            $bike->image_path = $request->file('image')->store('bikes');
        } 
        $bike->save();
        return redirect(route('bikes.index'))->with('status', "Rekord został zaaktualizowany");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        try{
            $bike->delete();
            return response()->json([
                'status' => 'success'
            ]);
        } catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'msg' => 'Nie wykonano poprawnie żądania!'
            ])->setStatusCode(500);
        }
    }
}
