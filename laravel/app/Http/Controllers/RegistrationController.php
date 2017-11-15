<?php

namespace App\Http\Controllers;

use App\User;

use App\Mail\Welcome;
use App\Mail\WelcomeAgain;

class RegistrationController extends Controller
{
	public function create(){
	
		return view('registration.create');
		
	}
	
	public function store(){
		
		//validation
		$this->validate(request(),[
				'name' => 'required',
				'email' => 'required|unique:users|email',
				'password' => 'required|confirmed'
		]);
		
		$user = User::create([
				'name' => request('name'),
				'email' => request('email'),
				'password' => bcrypt(request('password'))
		]);
		
		//$user = User::create(request(['name','email','password']));
		
		//sign in
		//\Auth::login();
		auth()->login($user);
		
		//Welcome Mail
		\Mail::to($user)->send(new WelcomeAgain($user));
		
		return redirect()->home();
	}
}
