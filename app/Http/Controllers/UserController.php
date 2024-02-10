<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  
	public function create()
	{
		return view("user.create");
	}

	public function store(Request $request)
	{
		$request->validate([
			"name"=> "required",
			"email"=> "email|unique:users",
			"password"=> "required|confirmed",
		]);

		$user = User::create([
			"name"=> $request->name,
			"email"=> $request->email,
			"password"=> bcrypt($request->password),
		]);

		session()->flash("success","Пользователь добавлен");
		Auth::login($user);
		return redirect()->home();
	}

	public function loginForm()
	{
		$logo = null;
		$nameOrg = 'Название организации';
		return view("user.login", compact("logo","nameOrg"));
	}

	public function login(Request $request)
	{
		$request->validate([
			"name"=> "required",
			"password"=> "required",
		]);

		if (Auth::attempt([
			'name' => $request->name,
			'password' => $request->password,
		])){
			session()->flash('success','Вход выполнен');
			if (Auth::user()->is_admin == 1) {
				return redirect()->route('admin.index');
			}	else if (Auth::user()->is_admin == 0){
				return redirect()->home();
			}
			return redirect()->back()->with('error', 'Неправильный логин или пароль');
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login.create');
	}

}
