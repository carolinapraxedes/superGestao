<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class testeProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'teste_products';
    protected $fillable = ['produtoExiste','produtos','comentario'];
}
