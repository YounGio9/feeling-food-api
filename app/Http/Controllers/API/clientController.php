<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $retour_ = [];

        foreach($clients as $client){
            array_push($retour_, [
                "firstname" => $client->firstname,
                "lastname" => $client->lastname,
                "phoneNumber" => $client->phoneNumber,
                "country" => $client->country
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Data succesfully retrieved",
            "data" => $retour_
        ]);
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
