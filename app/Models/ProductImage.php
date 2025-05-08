<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{


    protected $primaryKey = "image_id";
    use HasFactory;

    protected $fillable = [
        'image_id',
        'product_id',
        'image_url',
        'alt',
        'seq', //resmin sırasını tutacağız
        'is_active',
    ];
}
