<?php

namespace App\Http\Controllers;

use App\Models\Trips;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }

    public function AllTrip(){

    $trips = Trips::paginate(5);
    return view('admin/trips.index',compact('trips'));

    }

    public function AddTrip(Request $request){

        $validated = $request->validate([
            'trip_name' => 'required|max:255',
            'fromCity' => 'required',
            'toCity' => 'required',
            'datetime' => '',
            'cost' => '',

        ]);
        $Trip = new Trips();
        $Trip->name = $request->trip_name;
        $Trip->from = $request->fromCity;
        $Trip->to = $request->toCity;
        $Trip->datetime = $request->datetime;
        $Trip->cost = $request->cost;
        $Trip->save();

        return Redirect()->back()->with('success', 'Trip inserted successfully');
    }

    public function editTrip($id){
        $trip = Trips::find($id);
        return view('admin/trips.edit',compact('trip'));
    }

    public function updateTrip(Request $request , $id){
        $update = Trips::find($id)->update([
            'name' => $request->trip_name,
            'from' => $request->fromCity,
            'to' => $request->toCity,
            'datetime' => $request->datetime,
            'cost' => $request->cost,
        ]);
        return Redirect()->route('all.trips')->with('success', 'Trip updated successfully');

    }

    public function deleteTrip($id){

        $trip = Trips::find($id);
        $trip->delete();

        return Redirect()->route('all.trips')->with('success', 'Trip deleted successfully');
    }
}
