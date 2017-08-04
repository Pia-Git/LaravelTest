<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
	public function create(){
	
		return view('sessions.create');
		
	}
	
	public function store(){
		
		//validation
		$this->validate(request(),[
				'name' => 'required',
				'email' => 'required|unique:users|email',
				'password' => 'required|confirmed'
		]);
		
		$user = User::create(request(['name','email','password']));
		
		//sign in
		//\Auth::login();
		auth()->login($user);
		
		return redirect()->home();
	}
}
