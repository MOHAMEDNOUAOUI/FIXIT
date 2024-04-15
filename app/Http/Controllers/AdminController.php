<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Depanneur;
use App\Models\Metier;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::count();
        $depanneur = Depanneur::count();
        $users = User::count();
        $tickets = Ticket::count();
        $Metier = Metier::count();

        $CountUsers = [
            'Users' => $users,
            'Clients' => $clients,
            'Depanneurs' => $depanneur,
            'Tickets' => $tickets,
            'Metiers' => $Metier,
        ];



        return view('admin.analytics.dashboard' , compact('CountUsers'));
    }

    public function index_Subscription() {
        $clients = Client::count();
        $depanneur = Depanneur::count();
        $users = User::count();

        $metiers = Metier::withCount('Depanneur')
                    ->orderByDesc('depanneur_count')
                    ->take(4)
                    ->get();


        $Subscriptions = [
            'Users' => $users,
            'Clients' => $clients,
            'Depanneurs' => $depanneur,
        ];


        return view ('admin.analytics.Subscriptions' , compact('Subscriptions' , 'metiers'));
    }

    public function index_Customers() {
        $Usercount = [
            'Users' => User::count(),
            'Clients' => Client::count(),
            'Depanneur' => Depanneur::count(),
        ];
        return view ('admin.customers.index' , compact('Usercount'));
    }

    public function client_Customers () {
        $clients = Client::with('user')->paginate(10);
        return view('admin.customers.client' , compact('clients'));
    }

    public function depaneur_Customers () {
        $depanneurs = Depanneur::with('user')->paginate(10);
        return view('admin.customers.depaneur'  , compact('depanneurs'));
    }


    public function profile() {
        $user = Admin::with(['user.image'])->first();

        if ($user->user->image) {
            $imageData = $user->user->image->image;
            $base64Image = base64_encode($imageData);
            $user->user->image->base64 = $base64Image;
        }


        return view('admin.profile.index', compact('user'));
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
