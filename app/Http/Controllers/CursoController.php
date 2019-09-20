<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class CursoController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	return Curso::all();
    }
     
}
