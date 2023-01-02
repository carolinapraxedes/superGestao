<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){

        $reasonContact = [
            '1' => 'Questions',
            '2' => 'Commendation',
            '3' => 'Complain'
        ];

        return view('site.principal',['reasonContact'=>$reasonContact]);
    }
}
