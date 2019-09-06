<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
	public function datos() {
		return view('datos');	
	}

	 public function getUsuarios(Request $request) {

    	//return User::get() ;
    }

    
}
