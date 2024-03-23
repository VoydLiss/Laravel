<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ShareInfo;
use App\Http\Controllers\Controller;
use App\Models\Org;
use Illuminate\Http\Request;

class OrgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function index()
    {
      $org = Org::find(1);

			$form = ShareInfo::instance()->get_info();

			return view("admin.org.index", compact("org", "form"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

			$org = Org::find($id);
			return view('admin.org.edit', compact('org', 'form'));
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
				'name'=>'required',
			]);
			$org = Org::find($id);
			$org->Update($request->all());
			return redirect()->route('org.index')->with('success','Изменения сохранены');
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
