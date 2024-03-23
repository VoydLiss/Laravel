<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ShareInfo;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function index()
    {

			$form = ShareInfo::instance()->get_info();

			// $categories = Category::paginate(20);
			return view("admin.categories.index", compact( "form"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function create()
    {
			$form = ShareInfo::instance()->get_info();

			return view("admin.categories.create", compact("form"));
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
			]);
			
			Category::create($request->all());
			return redirect()->route('categories.index')->with('success','Категория добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
			$form = ShareInfo::instance()->get_info();

      $category = Category::find($id);
			return view('admin.categories.edit', compact('category', 'form'));
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
			]);
			$category = Category::find($id);
			// $category->slug = null;
			$category->Update($request->all());
			return redirect()->route('categories.index')->with('success','Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
			$category = Category::find($id);
			if($category->posts->count()) {
				return redirect()->route('categories.index')->with('error', 'У категории есть записи');
			}
			$category->delete();
      return redirect()->route('categories.index')->with('success','Категория удалена');
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
