<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'address_id';

    // Fillable columns
    protected $fillable = [
        "address_id",
        "user_id",
        "city",
        "district",
        "zipcode",
        "address",
        "is_default",
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
