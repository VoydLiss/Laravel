<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\ShareInfo;

class MainController extends Controller
{

	public function index()
	{
		$form = ShareInfo::instance()->get_info();
		
		return view('admin.index',compact('form'));
	}
}
