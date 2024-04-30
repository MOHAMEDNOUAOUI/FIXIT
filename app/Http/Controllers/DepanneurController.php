<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Depanneur;
use App\Models\Depanneur_ratings;
use App\Models\Notification;
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

        $notifications = Notification::with(['recievernot' , 'sendernot'])->get();

        $RatingsCount = Depanneur_ratings::count();
        
        $DeppaneurCount = Depanneur::count();
        
        $TicketsCount = Ticket::where('user_id' , Auth::id())->count();
        $userinfo = User::with(['image', 'depanneur'])->where('id', Auth::id())->first();
        
        if ($userinfo->image) {
            $imageData = $userinfo->image->image;
            $base64Image = base64_encode($imageData);
            $userinfo->image->base64 = $base64Image;
        }


        $ClientCount = service_appointements::where('depanneur_id' , $userinfo->depanneur->id)->groupBy('client_id')->get()->count();
        
        $servicecount = service_appointements::where('depanneur_id' , $userinfo->depanneur->id)->count('id');


        return view('Depaneur.index' , compact('ClientCount' , 'notifications' , 'DeppaneurCount' , 'TicketsCount' , 'userinfo' , 'servicecount' , 'RatingsCount'));
    }



    public function services(request $request) {



        $userinfo = User::with('image')->where('id' , Auth::id())->first();
        $depannuerId = Depanneur::where('user_id' , $userinfo->id)->first();
        

        $notifications = Notification::with(['recievernot' , 'sendernot'])->get();

      
            $appointements = service_appointements::with(['client.user.image', 'depanneur.user.image' , 'client.user.location'])
            ->where('depanneur_id', $depannuerId->id)
            ->orderByDesc('created_at')
            ->get();


            
        




    foreach ($appointements as $appointment) {
        if ($appointment->client->user->image) {
            $imageData = $appointment->client->user->image->image;
            $base64Image = base64_encode($imageData);
            $appointment->client->user->image->base64 = $base64Image;
        }
    }


        return view ('Depaneur.services' , compact('userinfo' , 'appointements' , 'notifications'));
    }




    public function Available(Request $request) {


        $Depanneur = Depanneur::where('user_id' , Auth::id())->first();
        
       if($Depanneur->status == 'available'){
        $Depanneur->status = "notavailable";
        $Depanneur->save();
       }
       else {
        $Depanneur->status = 'available';
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
