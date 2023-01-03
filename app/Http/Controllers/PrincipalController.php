<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reasonContact;

class PrincipalController extends Controller
{
    public function principal(){

        $reasonContact = reasonContact::all();
        
        //dd($reasonContact);
        return view('site.principal',['reasonContact'=>$reasonContact]);
    }
}
