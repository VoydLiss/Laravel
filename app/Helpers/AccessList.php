<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Office;
use App\Models\Org;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccessList 
{
	public function get_accesslist()
	{
		return ["admin"];
	}

	public static function instance()
	{
		return new AccessList();
	}

}
