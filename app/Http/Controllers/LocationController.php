<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $location = Location::where('user_id' , Auth::id())->first();


        if($location) {
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->save();
        }
        else {
            Location::create([
                'user_id' => Auth::id(),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
               ]);
        }


        $closestDepanneurs = User::select('users.id', 'users.name', 'locations.latitude', 'locations.longitude')
        ->join('locations', 'users.id', '=', 'locations.user_id')
        ->join('depanneurs' , 'users.id' , '=' , 'depanneurs.user_id')
        ->orderByRaw('POWER(locations.latitude - ?, 2) + POWER(locations.longitude - ?, 2)', [$request->latitude, $request->longitude])
        ->limit(4)
        ->get();
       

        return response()->json(['status' => 'success', 'closest_depanneurs' => $closestDepanneurs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    }


    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
