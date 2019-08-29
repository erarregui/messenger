<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit() {
    	return view('profile');
    }

    public function update(Request $request) {

    	//dd($request->all()); //para verificar que se recibe
    	$user = auth()->user(); //recupero todoso los usuarios
    	$user->name = $request->name; //recupero el nombre de usuario y le asigno $request->name 
    	$user->password = $request->password;
    	if ($request->password)
    		$user->password = bcrypt($request->password);
    	
    	$file = $request->image;
    	
    	if ($file) {
    		$path = public_path('/users');
    		$fileName = time() . '.' . $file->getClientOriginalExtension();
    		$moved = $file->move($path, $fileName);
    		$user->image = $fileName;
    	}

    	$user->save();
    	return back();
    	
    }
}
