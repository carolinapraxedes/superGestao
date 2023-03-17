<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =['name','description','weight','unitId','providerID'];

    public function productDetail(){
        return $this->hasOne(ProductDetail::class, 'productId');
        //estamos falando que o produto tem um produto detalhe
        //a fk de product esta sendo passado junto
    }

    public function provider(){
        return $this->belongsTo(Provider::class,'providerID');
    }
}
