<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
    
    public function primaryclasses(){

        return view('pages.primaryclasses');
    }

    
    public function secondaryclasses(){
        
        view('pages.secondaryclasses');
    }


    public function primary1(){

       
        
       return view('pages.primary1');
    }
}
