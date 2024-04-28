<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Mail\ServiceDone;
use App\Models\Client;
use App\Models\Depanneur;
use App\Models\Location;
use App\Models\Metier;
use App\Models\Notification;
use App\Models\service_appointements;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\select;

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

        // $formattedDateTime = $currentDateTime->format('l, F j, Y - h:i A');

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
           
            $clientEmail = Auth::user()->email;

            $depanneurEmail = $closestUser->email;

            $depanneurId = Depanneur::where('user_id' , $closestUser->id)->first();

            $clientid = Client::where('user_id' , Auth::id())->first();
           

                // Message sent successfully
                service_appointements::create([
                    'client_id' => $clientid->id,
                    'depanneur_id' => $depanneurId->id,
                    'service_type' => $metier->Metier,
                ]);

                Notification::create([
                    'reciever' => Auth::id(), // Assuming receiver is the client
                    'sender' => $closestUser->id, // Assuming sender is the service provider
                    'message' => 'Your service appointment for ' . $metier->Metier . ' has been booked successfully.',
                ]);

                Notification::create([
                    'reciever' => $closestUser->id, // Assuming receiver is the client
                    'sender' => Auth::id(), // Assuming sender is the service provider
                    'message' => '' . $clientid->name .' has booked a service from you for ' . $metier->Metier . '',
                ]);
                


                $success = true;
                return response()->json(['success' => $success]);

            
        } else {
            return response()->json( 'No users found.');
        }



    }


    
    /**
     * Display the specified resource.
     */
    

    public function filtering(Request $request) {
        
        $service = service_appointements::with(['client.user.location' , 'depanneur.user.location'])->where('id' , $request->input('id'))->first();
        return $service;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service_appointements $service_appointements)
    {
        //
    }

    public function statusupdate (Request $request) {
        $id = $request->input('id');
        $status = $request->input('status');

        $appointe = service_appointements::where('id' , $id)->first();
        $appointe->status = $status;
        $appointe->save();


        $userclient = client::where('id' , $appointe->client_id)->with('user')->first();

        $userdepanneur = User::where('id' , Auth::id())->first();

        if($status == "paid") {
           Notification::create([
                'reciever' => $userclient->user->id,
                'sender' => Auth::id(),
                'message' => "{$userdepanneur->name} has changed your reservation status to paid",
            ]);
        }


        return redirect()->back();
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
