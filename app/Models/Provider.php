<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;
    protected $table = 'providers';
    protected $fillable = ['name','site','uf','email'];

    public function products(){
        return $this->hasMany(Products::class,'providerID');
        //colocamos o modelo + fk
    }
}
