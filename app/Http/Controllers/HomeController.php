<?php

namespace App\Http\Controllers;

use App\Helpers\ShareInfo;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

	public function index()
	{
		$form = ShareInfo::instance()->get_info();
		$posts = Post::with('category')->where('category_id', '0')->orderBy('id', 'desc')->paginate(3);

		return view("home",compact( 'form', 'posts') );
	}

	public function show($slug)
	{
		$form = ShareInfo::instance()->get_info();

		return view("$slug", compact('form'));
	}

	public function part($slug)
	{
		$form = ShareInfo::instance()->get_info();

		$category = Category::where('slug', $slug)->firstOrFail();
		
		$posts = Post::with('category')
			->where('category_id', $category->id)
			->orderBy('id', 'desc')
			->paginate(3);
		
		if (Auth::user()->department == $category->id || Auth::user()->login == 'admin')
		{
			return view("departments.posts", compact('form', 'category', 'posts'));
		}
		else return view('departments.info', compact('form', 'category'));// view("show", compact('form',));//, ['slug' => 'departments']);
	}

}