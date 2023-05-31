<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    /**
     * Listes des reservations
     *
     * @return response
     */
    public function index(){
        $reservations = Reservation::all();
        $retour_ = [];

        foreach($reservations as $reservation){
            array_push($retour_, [
                "reservationTime" => $reservation->reservationTime,
                "reservationDate" => $reservation->reservationDate,
                "numberOfGuests" => $reservation->childrenGuests+$reservation->adultsGuests
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Data succesffully retrieved",
            "data" => $retour_

            // "data" => [$reservations["reservationDate"], $reservations["reservationTime"], $reservations['numberOfGuests']]
        ]);
    }
    /**
     * Creation de nouvelle réservation
     *
     * @return response
     */
    public function create(Request $request){
        $request->validate([
            "country" => ["required"],
            "phoneNumber" => ["required"],
            "email" => ["required", "email"],
            "lastname" => ["required"],
            "firstname" => ["required"],
            "typeOfMeal" => ["required"],
            "reservationTime" => ["required"],
            "reservationDate" => ["required"],
            "childrenGuests" => ["required"],
            "adultsGuests" => ["required"],
        ]);
        $cli = Client::where([
            ["firstname",  $request->firstname],
            ["lastname",  $request->lastname],
            ["phoneNumber",  $request->phoneNumber],
            ["country",  $request->country],
        ])->first();
        if($cli){

        }else{
            Client::create([
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "phoneNumber" => $request->phoneNumber,
                "country" => $request->country 
            ]);
        }
        $res = null;
        if($request->options){
            $res = Reservation::create([
                "country" => $request->country,
                "phoneNumber" => $request->phoneNumber,
                "comment" => $request->comment,
                "options" => $request->options,
                "email" => $request->email,
                "lastname" => $request->lastname,
                "firstname" => $request->firstname,
                "typeOfMeal" => $request->typeOfMeal,
                "reservationTime" => $request->reservationTime,
                "reservationDate" => $request->reservationDate,
                "childrenGuests" => $request->childrenGuests,
                "adultsGuests" => $request->adultsGuests,
            ]);
        }else{
            $res = Reservation::create([
                "country" => $request->country,
                "phoneNumber" => $request->phoneNumber,
                "comment" => $request->comment,
                "email" => $request->email,
                "lastname" => $request->lastname,
                "firstname" => $request->firstname,
                "typeOfMeal" => $request->typeOfMeal,
                "reservationTime" => $request->reservationTime,
                "reservationDate" => $request->reservationDate,
                "childrenGuests" => $request->childrenGuests,
                "adultsGuests" => $request->adultsGuests
            ]);
        }
        return response()->json([
            "sucess" => true,
            "message" => "reservation created succesffully",
            "data" => $res,
        ]);
    }
}
