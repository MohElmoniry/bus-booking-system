<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class CityController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }
    public function AllCities(){
        $cities = Cities::all();
        return view('admin/cities.index', compact('cities'));

    }

    public function AddCity(Request $request){

        $validated = $request->validate([
            'city_name' => 'required|max:255',


        ]);


        $City = new Cities();
        $City->name = $request->city_name;
        $City->save();

       return Redirect()->back()->with('success', 'City inserted successfully');
    }

    public function editCity($id){
            $city = Cities::find($id);
            return view('admin/cities.edit',compact('city'));
    }

    public function updateCity(Request $request , $id){
            $update = Cities::find($id)->update([
                'name' => $request->city_name
            ]);
        return Redirect()->route('all.cities')->with('success', 'City updated successfully');

    }

    public function deleteCity($id){

        $city = Cities::find($id);
        $city->delete();

        return Redirect()->route('all.cities')->with('success', 'City deleted successfully');
    }
}
