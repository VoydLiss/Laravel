<?php

namespace App\Http\Controllers;

use App\Helpers\ShareInfo;
use App\Models\Category;
use App\Models\Office;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

	public function show($slug)
	{
		$form = ShareInfo::instance()->get_info();

		$post = Post::where('slug', $slug)->firstOrFail();
		$post->views += 1;
		$post->update();
		
		return view('posts.show', compact( 'post', 'form'));
	}
	
	public function dshow($board, $slug)
	{
		$form = ShareInfo::instance()->get_info();

		$post = Post::where('slug', $slug)->firstOrFail();
		$post->views += 1;
		$post->update();

		$category = Category::where('slug', $board)->firstOrFail();

		if (Auth::user()->department == $category->id || Auth::user()->login == 'admin')
		{
			return view('posts.show', compact( 'post', 'form', 'category'));
		}
		else abort(404);
	}

}
