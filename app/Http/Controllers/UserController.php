<?php

namespace App\Http\Controllers;

use App\Helpers\ShareInfo;
use App\Models\Category;
use App\Models\Org;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  // Admin Form
	public function index()
	{
		$users = User::paginate(20);

		$form = ShareInfo::instance()->get_info();

		return view("admin.users.index", compact("users", "form"));
	}

	public function create()
	{
		$form = ShareInfo::instance()->get_info();
		$categories = Category::pluck('title','id')->all();
		$role = $this->check_role();

		return view("admin.users.create", compact("form", "categories", "role"));
	}

	public function store(Request $request)
	{
		$request->validate([
			"name"=> "required",
			"surname"=> "required",
			"patronymic"=> "required",
			"phone"=> "required|unique:users",
			"login"=> "required|unique:users",
			"email"=> "email",
			"department"=>"required",
			"position"=> "required",
			"password"=> "required|confirmed",
		]);

		$user = User::create([
			"name"=> $request->name,
			"surname"=> $request->surname,
			"patronymic"=> $request->patronymic,
			"phone"=> $request->phone,
			"login"=> $request->login,
			"email"=> $request->email,
			"department"=> $request->department,
			"position"=> $request->position,
			"is_admin"=> $request->is_admin,
			"password"=> bcrypt($request->password),
		]);

		session()->flash("success","Пользователь добавлен");
		return redirect()->route('register.index');
	}

	public function edit($id)
	{
		$form = ShareInfo::instance()->get_info();

		$user = User::find($id);
		$categories = Category::pluck('title','id')->all();
		$role = $this->check_role();

		return view('admin.users.edit', compact('user', "form", "categories", "role"));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			"name"=> "required",
			"surname"=> "required",
			"patronymic"=> "required",
			"phone"=> "required",
			"is_admin"=> "required",
			// "login"=> "required",
			"email"=> "email",
			"department"=>"required",
			"position"=> "required",
		]);
		$user = User::find($id);
		$user->Update($request->all());
		return redirect()->route('register.index')->with('success','Изменения сохранены');
	}

	public function destroy($id) 
	{
		User::destroy($id);
		return redirect()->back()->with('success','Пользователь удалён');
	}

	//  User Form
	public function loginForm()
	{
		$logo = null;
		$OrgInfo = Org::find(1);
		if (!$OrgInfo) $OrgInfo = "Название";

		return view("user.login", compact("OrgInfo", "logo"));
	}

	public function login(Request $request)
	{
		$in = $request->validate([
			//$this->name($request)=> "required",
			$this->name($request)=> "required",
			"password"=> "required",
		]);

		// if (Auth::attempt([
		// 	'login' => $request->login,
		// 	'password' => $request->password,
		// ]))
		if (Auth::attempt($in))
		{
			// session()->flash('success','Вход выполнен');
			if (Auth::user()->is_admin == 1) {
				return redirect()->route('admin.index');
			}	else if (Auth::user()->is_admin == 0 || Auth::user()->is_admin == 2){
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

	protected function name(Request $request)
	{
    return is_numeric($request->get('login'))? "phone" : "login";
	}
	
	public function check_role()
	{
		return ["0" => "Пользователь", "1" => "Администратор", "2" => "Редактор"];
	}
}
