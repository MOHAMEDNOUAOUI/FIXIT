<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Metier;
use App\Models\Notification;
use App\Models\service_appointements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::with(['recievernot.image' , 'sendernot.image'])->where('reciever' , Auth::id())->orderByDesc('created_at')->get();

        foreach($notifications as $notification){
            if ($notification->sendernot->image) {
                $imageData = $notification->sendernot->image->image;
                $base64Image = base64_encode($imageData);
                $notification->sendernot->image->base64 = $base64Image;
            }
        }


        return view('client.index' , compact('notifications'));
    }

    public function services() {
        $notifications = Notification::with(['recievernot.image' , 'sendernot.image'])->where('reciever' , Auth::id())->orderByDesc('created_at')->get();

        foreach($notifications as $notification){
            if ($notification->sendernot->image) {
                $imageData = $notification->sendernot->image->image;
                $base64Image = base64_encode($imageData);
                $notification->sendernot->image->base64 = $base64Image;
            }
        }


        $metier = Metier::with(['sous_metier' , 'Depanneur' => function($query) {
            $query->where('status' , 'available');
        }])->paginate(3);

        
        return view('client.services' , compact('metier' , 'notifications'));
    }

    public function support() {
        $notifications = Notification::with(['recievernot.image' , 'sendernot.image'])->where('reciever' , Auth::id())->orderByDesc('created_at')->get();

        foreach($notifications as $notification){
            if ($notification->sendernot->image) {
                $imageData = $notification->sendernot->image->image;
                $base64Image = base64_encode($imageData);
                $notification->sendernot->image->base64 = $base64Image;
            }
        }
        return view('client.support' , compact('notifications'));
    }




    public function appointement() {


       $notifications = Notification::with(['recievernot.image' , 'sendernot.image'])->where('reciever' , Auth::id())->orderByDesc('created_at')->get();


       foreach($notifications as $notification){
        if ($notification->sendernot->image) {
            $imageData = $notification->sendernot->image->image;
            $base64Image = base64_encode($imageData);
            $notification->sendernot->image->base64 = $base64Image;
        }
    }

        $clientId = Client::where('user_id' , Auth::id())->first();
      
        $appointements = service_appointements::with(['client.user.image', 'depanneur.user.image' , 'client.user.location'])
        ->where('client_id', $clientId->id)
        ->orderByDesc('created_at')
        ->get();



        foreach ($appointements as $appointment) {
            if ($appointment->client->user->image) {
                $imageData = $appointment->client->user->image->image;
                $base64Image = base64_encode($imageData);
                $appointment->client->user->image->base64 = $base64Image;
            }

            if ($appointment->depanneur->user->image) {
                $imageData = $appointment->depanneur->user->image->image;
                $base64Image = base64_encode($imageData);
                $appointment->depanneur->user->image->base64 = $base64Image;
            }
        }




        return view('client.appointements' , compact('notifications' , 'appointements'));
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
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
