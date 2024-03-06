<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function index()
    {
			$posts = Post::with('category')->paginate(20);
			return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function create()
    {
			$categories = Category::pluck('title', 'id')->all();
			return view("admin.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
      $request->validate([
				'title'=>'required',
				'description'=>'required',
				'content'=>'required',
				'category_id'=>'required|integer',
				'thumbnail'=>'nullable|image',
			]);

			$data = $request->all();
			$data['thumbnail'] = Post::uploadImage($request);

			$post= Post::create($data);

			return redirect()->route('posts.index')->with('success','Статья добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
			$post = Post::find($id);
			$categories = Category::pluck('title','id')->all();
			return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
			$request->validate([
				'title'=>'required',
				'description'=>'required',
				'content'=>'required',
				'category_id'=>'required|integer',
				'thumbnail'=>'nullable|image',
			]);
			$post = Post::find($id);
			$data = $request->all();
			$data['thumbnail'] = Post::uploadImage($request, $post->thumbnail);

			$post->update($data);

			return redirect()->route('posts.index')->with('success','Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) 
    {
			$post = Post::find($id);
			Storage::delete($post->thumnail);
			Post::destroy($id);
      return redirect()->route('posts.index')->with('success','Статья удалена');
    }
		
		/**
		 * Показать профиль конкретного пользователя.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\RedirectResponse
		 */
    public function show($id)
    {
			//
    }
}
