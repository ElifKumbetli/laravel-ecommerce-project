<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Adress extends Model
{
    /** @use HasFactory<\Database\Factories\AdressFactory> */
    use HasFactory, SoftDeletes;


    protected $primarykey = "address_id";

    protected $fillable = [
        "address_id",
        "user_id",
        "city",
        "district",
        "zipcode",
        "address",
        "is_default",
    ];
}
