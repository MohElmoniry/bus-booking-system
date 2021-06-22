<?php

namespace App\Http\Controllers;

use App\Models\Busses;
use App\Models\Cities;
use App\Models\Trips;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
            public function searchTrips(Request $request){
                if($request->to == 'Asyuit' || $request->to == "AlFayyum" || $request->to == 'AlMinya')
                {
                    $cities = Cities::all();
                    $bus = Busses::first();
                    $trips = Trips::where('from', '=' , $request->from)
                        ->where('to', '=' , $request->to)
                        ->orWhere('to', 'AlMinya')
                        ->orWhere('to', 'AlFayyum')
                        ->whereBetween('datetime' ,[$request->datefrom , $request->dateto])
                        ->where('capacity', '>=' , $request->passengers)
                        ->get();
                    return view('frontend/trips-index',compact('trips','cities','bus'));
                }
                else {
                    $cities = Cities::all();
                    $bus = Busses::first();
                    $trips = Trips::where('from', '=', $request->from)
                        ->where('to', '=', $request->to)
                        ->whereBetween('datetime', [$request->datefrom, $request->dateto])
                        ->where('capacity', '>=', $request->passengers)
                        ->get();
                    return view('frontend/trips-index', compact('trips', 'cities', 'bus'));
                }
            }

            public function bookTrip($id){
                $user = Auth::user();
                $trip = Trips::find($id);
                $user->trips()->attach($trip->id);
                $capacity = $trip->capacity - 1;
                $trip->update([
                  'capacity'=>$capacity
                ]);


                return Redirect()->back()->with('success', 'You booked');
            }

            public function searchMyTrips(){
                $user = Auth::user();
                $trips = $user->trips()->get();

                return view('frontend/mytrips',compact('trips'));

            }
}
