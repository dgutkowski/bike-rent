<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('welcome', [
            'bikes' => Bike::paginate(8)
        ]);
    }

    public function show(Bike $bike)
    {
        return view('reserv.show', [ 
            'bike' => $bike
        ]);
    }

    public function store(StoreReservationRequest $request)
    {
        $reservation = new Reservation($request->validated());
        $reservation->save();
        return view('welcome', [
            'bikes' => Bike::paginate(8)
        ]);
        //return redirect(route('reserv.store'));
    }
}
