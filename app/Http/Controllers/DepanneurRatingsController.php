<?php

namespace App\Http\Controllers;

use App\Models\Depanneur_ratings;
use App\Models\Notification;
use App\Models\service_appointements;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DepanneurRatingsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
            'appointe' => 'required', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rating = $request->input('rating');
        $appointeid = $request->input('appointe');

        $appointement = service_appointements::where('id' , $appointeid)->with(['client.user' , 'depanneur.user'])->first();

        Depanneur_ratings::create([
            'depanneur_id' =>$appointement->depanneur_id ,
            'client_id' => $appointement->client_id,
            'stars' => $rating,
        ]);

        $clientNotificationMessage = "You have rated the service with $rating star(s). Thank you for your feedback!";
        Notification::create([
            'reciever' => $appointement->client->user->id,
            'sender' => $appointement->depanneur->user->id,
            'message' => $clientNotificationMessage,
        ]);

        $depanneurNotificationMessage = "A client has rated your service with $rating star(s).";
        Notification::create([
            'reciever' => $appointement->depanneur->user->id,
            'sender' => $appointement->client->user->id,
            'message' => $depanneurNotificationMessage,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Depanneur_ratings $depanneur_ratings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depanneur_ratings $depanneur_ratings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depanneur_ratings $depanneur_ratings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depanneur_ratings $depanneur_ratings)
    {
        //
    }
}
