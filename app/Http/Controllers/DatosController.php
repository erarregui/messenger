<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;

class DatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
	public function index() {
		return view('datos');	
	}

	/* public function getAlumno(Request $request) {

    	$alumno = new Dato;

        $alumno->name = $request->name;
        $alumno->lastName = $request->lastName;
        $alumno->email = $request->email;
        $alumno->amount = $request->amount;
        $alumno->id_course = $request->id_course;
        $saved = $alumno->save();
        //si el mensaje se registra sasifactoriamente

        //el servidor responde "success" 
        $data = [];
        $data['success'] = $saved;
        $data['message'] = $message;
        return $data;

    }*/

    
}
