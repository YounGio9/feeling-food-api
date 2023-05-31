<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "country",
        "phoneNumber",
        "email",
        "lastname",
        "firstname",
        "options",
        "typeOfMeal",
        "reservationTime",
        "reservationDate",
        "childrenGuests",
        "comment",
        "adultsGuests",
    ];
}
