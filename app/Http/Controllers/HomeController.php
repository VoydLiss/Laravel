<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

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

		return view("home", ['logo' => null, 'nameOrg' => 'Название организации','employeeName'=> 'Фамилия И.О.', 'rights'=> 'права']);
	}

}