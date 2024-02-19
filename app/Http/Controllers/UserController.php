<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  // Admin Form
	public function index()
	{
		$users = User::paginate(20);
		return view("admin.users.index", compact("users"));
	}

	public function create()
	{
		return view("admin.users.create");
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
		return redirect()->route('register.index');
	}

	public function edit($id)
	{
		 $user = User::find($id);
		 return view('admin.users.edit', compact('user'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name'=>'required',
		]);
		$user = User::find($id);
		$user->Update($request->all());
		return redirect()->route('register.index')->with('success','Изменения сохранены');
	}

	public function show($id)  //!!! ОШИБКА В МАРШРУТАХ (ИСПОЛЬЗУЕТСЯ ВМЕСТО МЕТОДА destroy()) !!!
	{
		User::destroy($id);
		return redirect()->back()->with('success','Пользователь удалён');
	}

	//  User Form
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
			// session()->flash('success','Вход выполнен');
			if (Auth::user()->is_admin == 1) {
				return redirect()->route('admin.index');
			}	else if (Auth::user()->is_admin == 0){
				return redirect()->home();
			}
			return redirect()->route('logout')->with('error', 'Неправильный логин или пароль');
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login.create');
	}

}
