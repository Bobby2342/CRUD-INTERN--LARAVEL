<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function State(){

       $states = DB::table('state')->pluck('state_name', 'state_id');

       return view('dependent ' , compact('states'));
    }

    public function City(Request $request){

        $selectedState = $request->input('state');

        // Fetch cities based on the selected state from your database
        $cities = City::where('state', $selectedState)->get(); // Replace City with your model

        // Return cities as JSON with 'id' and 'name' properties
        return response()->json($cities);
      echo $cities->name;
    }
}
