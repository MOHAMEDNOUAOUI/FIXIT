<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Depanneur;
use App\Models\service_appointements;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepanneurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ClientCount = Client::count();
        $DeppaneurCount = Depanneur::count();
        $TicketsCount = Ticket::where('user_id' , Auth::id())->count();
        $userinfo = User::with(['image', 'depanneur'])->where('id', Auth::id())->first();
        if ($userinfo->image) {
            $imageData = $userinfo->image->image;
            $base64Image = base64_encode($imageData);
            $userinfo->image->base64 = $base64Image;
        }
        

        return view('Depaneur.index' , compact('ClientCount' , 'DeppaneurCount' , 'TicketsCount' , 'userinfo'));
    }

    public function services(request $request) {



        $userinfo = User::with('image')->where('id' , Auth::id())->first();
        $depannuerId = Depanneur::where('user_id' , $userinfo->id)->first();
        

        if($request->has('Pending')){
            $appointements = service_appointements::with(['client.user.image', 'depanneur.user.image'])
    ->where('depanneur_id', $depannuerId->id)
    ->where('status' , 'pending')
    ->paginate(10);
        }
        elseif($request->has('On')){
            $appointements = service_appointements::with(['client.user.image', 'depanneur.user.image'])
    ->where('depanneur_id', $depannuerId->id)
    ->where('status' , 'ongoing')
    ->paginate(10);
        }
        elseif($request->has('Payed')){
            $appointements = service_appointements::with(['client.user.image', 'depanneur.user.image'])
    ->where('depanneur_id', $depannuerId->id)
    ->where('status' , 'payed')
    ->paginate(10);
        }
        elseif($request->has('new')){
            $appointements = service_appointements::with(['client.user.image', 'depanneur.user.image'])
    ->where('depanneur_id', $depannuerId->id)
    ->orderBy ('created_at', 'desc')
    ->paginate(10);
        }
        elseif($request->has('old')) {
            $appointements = service_appointements::with(['client.user.image', 'depanneur.user.image'])
            ->where('depanneur_id', $depannuerId->id)
            ->paginate(10);
        }
        else {
            $appointements = service_appointements::with(['client.user.image', 'depanneur.user.image'])
            ->where('depanneur_id', $depannuerId->id)
            ->paginate(10);
        }


    foreach ($appointements as $appointment) {
        if ($appointment->client->user->image) {
            $imageData = $appointment->client->user->image->image;
            $base64Image = base64_encode($imageData);
            $appointment->client->user->image->base64 = $base64Image;
        }
    }


        return view ('Depaneur.services' , compact('userinfo' , 'appointements'));
    }

    public function Rating() {

        $userinfo = User::with('image')->where('id' , Auth::id())->first();

       
        if ($userinfo->image) {
            $imageData = $userinfo->image->image;
            $base64Image = base64_encode($imageData);
            $userinfo->image->base64 = $base64Image;
        }
        return view ('Depaneur.Rating' , compact('userinfo'));
    }



    public function Available(Request $request) {
        $Depanneur = Depanneur::where('user_id' , Auth::id())->first();
       if($Depanneur->status == 'Available'){
        $Depanneur->status = "Not_Available";
        $Depanneur->save();
       }
       else {
        $Depanneur->status = 'Available';
        $Depanneur->save();
       }

       

       return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Depanneur $depanneur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depanneur $depanneur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depanneur $depanneur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depanneur $depanneur)
    {
        //
    }
}
