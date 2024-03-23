<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ShareInfo;
use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function index()
    {
			$form = ShareInfo::instance()->get_info();

			$offices = Office::paginate(20);

			return view("admin.offices.index", compact("form", "offices"));
    }

		/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
		public function create()
    {
			$form = ShareInfo::instance()->get_info();

			$offices = Office::paginate(20);

			return view("admin.offices.create", compact("form", "offices"));
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
				'office'=>'required',
			]);
			
			Office::create($request->all());
			return redirect()->route('offices.index')->with('success','Информация добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

			$offices = Office::find($id);

			return view('admin.offices.edit', compact( 'form', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse returned
     */
    public function update(Request $request, $id)
    {
			$request->validate([
				'phone'=>'required',
			]);

			return redirect()->route('offices.index')->with('success','Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
