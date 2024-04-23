<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Metier;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.index');
    }

    public function services() {
        $metier = Metier::with(['sous_metier' , 'Depanneur'])->paginate(3);
        return view('client.services' , compact('metier'));
    }

    public function support() {
        return view('client.support');
    }


    public function contact() {
        return view('client.contact');
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
