<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ShareInfo;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function index()
    {
			$form = ShareInfo::instance()->get_info();
		
			return view('editor.index',compact('form'));
		}
    
}
