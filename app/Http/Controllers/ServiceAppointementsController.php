<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Mail\ServiceDone;
use App\Models\Depanneur;
use App\Models\Location;
use App\Models\Metier;
use App\Models\service_appointements;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ServiceAppointementsController extends Controller
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
    public function create(Request $request)
    {
        dd($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('l, F j, Y - h:i A');

        $userlocation = Location::where('user_id' , Auth::id())->first();
        
        $metier_id = $request->input('order');

        $metier = Metier::where('id' , $metier_id)->first();

        $mylatitude = $userlocation->latitude;
        $mylongitude = $userlocation->longitude;

        $alluserslocations = User::whereHas('depanneur', function ($query) use ($metier_id) {
            $query->where('status', 'Available')
                  ->whereHas('metiers', function ($query) use ($metier_id) {
                      $query->where('metier_id', $metier_id);
                  });
        })
        ->with('location')  
        ->get();
       

        $closestUser = null;
        $closestDistance = null;


        foreach($alluserslocations as $userlocation){
            $distance = sqrt(pow($userlocation->latitude - $mylatitude, 2) + pow($userlocation->longitude - $mylongitude, 2));


            if($closestDistance === null || $distance < $closestDistance){
                $closestDistance = $distance;
                $closestUser = $userlocation;
            }
        }


        if ($closestUser !== null) {
            $messageData = [
                'from_id' => $closestUser->id, // Your user ID
                'to_id' => Auth::id(), // ID of the closest user
                'body' => 'Hello Sir , How can i help you', // Your message content
                'attachment' => 'nothing',
            ];


            $clientEmail = Auth::user()->email;
            $depanneurEmail = $closestUser->email;

            $serviceDoneEmail = new ServiceDone();

            Mail::to($clientEmail)->send($serviceDoneEmail);

            if (Chatify::newMessage($messageData)) {
                // Message sent successfully
                service_appointements::create([
                    'client_id' => Auth::id(),
                    'depanneur_id' => $closestUser->id,
                    'service_type' => $metier->Metier,

                ]);


                $success = true;
                return response()->json(['success' => $success]);
            } else {
                // Failed to send message
                return response()->json('Failed to send message', 500);
            }
            
        } else {
            return response()->json( 'No users found.');
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(service_appointements $service_appointements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service_appointements $service_appointements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service_appointements $service_appointements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service_appointements $service_appointements)
    {
        //
    }
}
