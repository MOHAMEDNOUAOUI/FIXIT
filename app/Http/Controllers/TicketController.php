<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $notifications = Notification::with(['recievernot.image' , 'sendernot.image'])->where('reciever' , Auth::id())->get();

        foreach($notifications as $notification){
            if ($notification->sendernot->image) {
                $imageData = $notification->sendernot->image->image;
                $base64Image = base64_encode($imageData);
                $notification->sendernot->image->base64 = $base64Image;
            }
        }

        $tickets = Ticket::orderBy('created_at', 'desc')
        ->paginate(4);

        foreach($tickets as $ticket){
            $createdAtParsed = Carbon::parse($ticket->updated_at)->diffForHumans();
            $ticket->created_at_parsed = $createdAtParsed;
        }


    return view('admin.Tickets.index', compact('tickets' , 'notifications'));
}




public function filter (Request $request) {
    if ($request->has('low')) {
        $tickets = Ticket::where('priority', 'Low priority')->paginate(10);
    } elseif ($request->has('approved')) {
        $tickets = Ticket::where('priority', 'Approved')->paginate(10);
    } elseif ($request->has('high')) {
        $tickets = Ticket::where('priority', 'High priority')->paginate(10);
    } 
    return view('admin.Tickets.index', compact('tickets'));
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
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'request' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // If validation passes, create the ticket
        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'Type' => $request->input('request'),
            'Subject' => $request->input('subject'),
            'Message' => $request->input('message'), 
        ]);
    
        // Redirect back with success message or any other logic
        return redirect()->back()->with('success', 'Ticket created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {

        if($ticket->user_id != Auth::id()){
            abort(403);
        }

        $ticket->load('answer.user.image');
        
        $notifications = Notification::with(['recievernot.image' , 'sendernot.image'])->where('reciever' , Auth::id())->get();


        foreach($ticket->answer as $answer){
            $createdAtFormatted = Carbon::parse($answer->created_at)->format('F d, Y H:i');
            $answer->created_at_parsed = $createdAtFormatted;


            if($answer->user->image){
                $imageData = $answer->user->image->image;
            $base64Image = base64_encode($imageData);
            $answer->user->image->base64 = $base64Image;
            }
        }

        return view('client.ticketresponse' , compact('ticket' , 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }


    public function ticketshow(Request $request) {

        if($request->input('filter')){
            $tickets = Ticket::where('user_id', Auth::id())
            ->where('priority' , $request->input('filter'))
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        }

        else {
            $tickets = Ticket::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        }

        $notifications = Notification::with(['recievernot.image' , 'sendernot.image'])->where('reciever' , Auth::id())->get();

        foreach($notifications as $notification){
            if ($notification->sendernot->image) {
                $imageData = $notification->sendernot->image->image;
                $base64Image = base64_encode($imageData);
                $notification->sendernot->image->base64 = $base64Image;
            }
        }


        foreach($tickets as $ticket){
            $createdAtParsed = Carbon::parse($ticket->created_at)->diffForHumans();
            $ticket->created_at_parsed = $createdAtParsed;
        }
        return view('client.alltickets' , compact('tickets' , 'notifications'));
    }




    public function ticketshowadmin(Request $request) {
        if($request->input('filter')){
            $tickets = Ticket::
            where('priority' , $request->input('filter'))
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        }
        else {
            $tickets = Ticket::orderBy('created_at', 'desc')
            ->paginate(4);
        }

        $notifications = Notification::with(['recievernot.image' , 'sendernot.image'])->where('reciever' , Auth::id())->get();

        foreach($notifications as $notification){
            if ($notification->sendernot->image) {
                $imageData = $notification->sendernot->image->image;
                $base64Image = base64_encode($imageData);
                $notification->sendernot->image->base64 = $base64Image;
            }
        }


        foreach($tickets as $ticket){
            $createdAtParsed = Carbon::parse($ticket->created_at)->diffForHumans();
            $ticket->created_at_parsed = $createdAtParsed;
        }

        return view('admin.tickets.index' , compact('tickets'));
    }




    public function ticketpage($id) {
        $ticket = Ticket::where('id' , $id)->with('answer.user.image')->first();


        foreach($ticket->answer as $answer){
            $createdAtFormatted = Carbon::parse($answer->created_at)->format('F d, Y H:i');
            $answer->created_at_parsed = $createdAtFormatted;


            if($answer->user->image){
                $imageData = $answer->user->image->image;
            $base64Image = base64_encode($imageData);
            $answer->user->image->base64 = $base64Image;
            }
        }

        return view('admin.tickets.ticket' , compact('ticket'));
    }       













    public function ticketsearch(Request $request) {


        $tickets = Ticket::where('user_id', Auth::id())
            ->where('Subject', 'like', '%' . $request->input('search') . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

            foreach($tickets as $ticket){
                $createdAtParsed = Carbon::parse($ticket->created_at)->diffForHumans();
                $ticket->created_at_parsed = $createdAtParsed;
            }

            
            return response()->json($tickets);
    }


    public function ticketsearchadmin(Request $request) {
        $tickets = Ticket::where('Subject', 'like', '%' . $request->input('search') . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(6);

        foreach($tickets as $ticket){
            $createdAtParsed = Carbon::parse($ticket->created_at)->diffForHumans();
            $ticket->created_at_parsed = $createdAtParsed;
        }

        
        return response()->json($tickets);
    }
}
