<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
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
}
