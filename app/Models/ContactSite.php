<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSite extends Model
{
    use HasFactory;//necessário para rodar a factory no seeder
    protected $table = 'contact_sites';
    protected $fillable = ['name','phoneNumber','email','reasonContactId','message'];
}
