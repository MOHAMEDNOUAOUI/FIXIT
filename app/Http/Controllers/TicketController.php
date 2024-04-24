<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
        $tickets = Ticket::paginate(10);
    return view('admin.Tickets.index', compact('tickets'));
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

       
        $requestType = $request->input('request');
        $subject = $request->input('subject');
        $message = $request->input('message');


        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'Type' => $requestType,
            'Subject' => $subject,
            'Message' => $message, 
        ]);

       
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket->load('answer.user.image');
        

        foreach($ticket->answer as $answer){
            $createdAtFormatted = Carbon::parse($answer->created_at)->format('F d, Y H:i');
            $answer->created_at_parsed = $createdAtFormatted;


            if($answer->user->image){
                $imageData = $answer->user->image->image;
            $base64Image = base64_encode($imageData);
            $answer->user->image->base64 = $base64Image;
            }
        }

        return view('client.ticketresponse' , compact('ticket'));
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

       


        foreach($tickets as $ticket){
            $createdAtParsed = Carbon::parse($ticket->created_at)->diffForHumans();
            $ticket->created_at_parsed = $createdAtParsed;
        }
        return view('client.alltickets' , compact('tickets'));
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
}
