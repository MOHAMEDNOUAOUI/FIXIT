<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metierwithusers = Metier::with('Depanneur.user')->get();
        return view('admin.services.index' , compact('metierwithusers'));
    }

    public function add_admin() {
        return view('admin.services.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
            $metier = $request->input('metier');
            Metier::create([
                'Metier' => $metier,
            ]);

            return redirect()->back();
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
    public function show(Metier $metier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metier $metier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Metier $metier , $id)
{
    $Metier = Metier::findOrFail($id);

    if ($Metier->Metier != $request->input('newmetier')) {
        $Metier->Metier = $request->input('newmetier');
        $Metier->save();
        Session::flash('success', 'Metier updated successfully!');
    }
    else {
        Session::flash('success', 'No changes were made.');
    }

    return redirect()->back();
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

            $metier = Metier::findOrFail($id);
            $metier->Delete();


            return redirect()->back ();  
        
        }
}
