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
use Illuminate\Support\Facades\Validator;

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
           


            $service = service_appointements::where('client_id' , Auth::id())->where('service_type' , $metier->Metier)->where(function($query) {
                $query->where('status' , 'pending')
                ->orwhere('status' , 'ongoing');
            })->first();

            
            if($service) {
                return response()->json( 'You have Already Reserved');
            }
            

                // Message sent successfully
                service_appointements::create([
                    'client_id' => Auth::id(),
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
                


               
                return response()->json(['success' => 'You Have Succefully reserved a service']);

            
        } else {
            return response()->json( 'Sorry we couldnt find any depanneur closer to you.');
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

    }


    public function ratingupdate (Request $request) {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
            'appointe' => 'required', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rating = $request->input('rating');
        $appointeid = $request->input('appointe');

        $appointement = service_appointements::where('id' , $appointeid)->first();

        if ($appointement->Stars != null) {
            return redirect()->back()->with('message', "You have Already Rated this Service with $rating star(s).");
        }
        $appointement->Stars = $request->input('rating');
        $appointement->save();
        

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
     * Remove the specified resource from storage.
     */
    public function destroy(service_appointements $service_appointements)
    {
        //
    }
}
