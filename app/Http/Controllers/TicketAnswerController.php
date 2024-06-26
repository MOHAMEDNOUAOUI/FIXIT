<?php

namespace App\Http\Controllers;

use App\Models\Ticket_Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketAnswerController extends Controller
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
        if ($request->input('answer')) {
           Ticket_Answer::create([
            'ticket' => $request->input('ticketid'),
            'replyer' => Auth::id(),
            'answer' => $request->input('answer'),
           ]);
        }


        return redirect()->back();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Ticket_Answer $ticket_Answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket_Answer $ticket_Answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket_Answer $ticket_Answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket_Answer $ticket_Answer)
    {
        //
    }
}
