<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    
    protected $table = 'products_details';
    protected $fillable = ['productId','length','width','height','unitId'];


    public function products()
    {
        return $this->belongsTo(Products::class,'productId');
    }
}

