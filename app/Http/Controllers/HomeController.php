<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Org;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

	function get_info()
	{
		$OrgInfo = Org::find(1);
		$UserInfo = [
			'name'=> Auth::user()->name,//'Фамилия И.О.',
			'rights'=> $this->auth_role("", "администратор", "редактор"),
			'role'=> $this->auth_role("", "-admin", "-editor"),
		];
		$BtnUser = $this->auth_role("#", "admin.index", "#");

		$categories = Category::paginate(20);

		$f = ['OrgInfo' => $OrgInfo, 'UserInfo' => $UserInfo, 'BtnUser' => $BtnUser, 'categories' => $categories];

		return $f;
	}

	public function index()
	{
		// $OrgInfo = Org::find(1);
		// $UserInfo = [
		// 	'name'=> Auth::user()->name,//'Фамилия И.О.',
		// 	'rights'=> $this->auth_role("", "администратор", "редактор"),
		// 	'role'=> $this->auth_role("", "-admin", "-editor"),
		// ];
		// $BtnUser = $this->auth_role("#", "admin.index", "#");

		// $categories = Category::paginate(20);

		$form = $this->get_info();

		$posts = Post::with('category')->orderBy('id', 'desc')->paginate(3);
		
		return view("home",compact( 'form', 'posts') );
	}

	public function show($slug)
	{
		$OrgInfo = Org::find(1);
		$UserInfo = [
			'name'=> Auth::user()->name,//Фамилия И.О.
			'rights'=> $this->auth_role("", "администратор", "редактор"),
			'role'=> $this->auth_role("", "-admin", "-editor"),
		];
		$BtnUser = $this->auth_role("#", "admin.index", "#");

		$categories = Category::paginate(20);
		$users = User::paginate(20);

		return view("$slug", compact('OrgInfo', 'UserInfo', 'BtnUser', 'users', 'categories'));
	}

	function auth_role($usr, $adm, $edr)
	{
		return !Auth::user()->is_admin ? $usr : (Auth::user()->is_admin ? $adm : $edr);
	}
}