<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Org;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function index()
	{
		// $query = DB::insert("INSERT INTO posts (title. content")

		// $posts = DB::select("SELECT * FROM posts");
		// return $posts;

		// $post = new Post();
		// $post->title = "Статья 2";
		// $post->content = "Lorem ipsum 1";
		// $post->save();

		// $data = Country::all();
		// dump("");

		//  $user = User::find($id);
		$OrgInfo = Org::find(1);
		$UserInfo = [
			'name'=> Auth::user()->name,//'Фамилия И.О.',
			'rights'=> !Auth::user()->is_admin ? "" : (Auth::user()->is_admin ? "администратор" : "редактор"),
		];
		$BtnUser = !Auth::user()->is_admin ? "#" : (Auth::user()->is_admin ? "admin.index" : "#");

		return view("home", compact('OrgInfo', 'UserInfo', 'BtnUser'));
	}
}