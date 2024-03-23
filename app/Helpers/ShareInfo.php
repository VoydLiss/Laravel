<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Office;
use App\Models\Org;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShareInfo 
{
	
	public function get_info()
	{
		$OrgInfo = Org::find(1);
		$UserInfo = $this->user_role();
		$BtnUser = $this->auth_role("home", "admin.index", "editor.index");
		// $Office = $this->office_info();

		$categories = Category::where('id', '<>', '0')->paginate(20);
		$offices = Office::paginate(3);
		$users = $this->get_users()->paginate(3);
		
		$f = [
			'OrgInfo' => $OrgInfo, 
			'UserInfo' => $UserInfo, 
			'BtnUser' => $BtnUser, 
			'categories' => $categories,
			'offices' => $offices,
			'users' => $users
		];
			//, 'Office' => $Office];
		
		return $f;
	}
	
	public function user_role()
	{
		$user = Auth::user();
		$Role = [
			'user' => $user,
			'surname'=> $user->surname,
			'name'=> $user->name,
			'patronymic'=> $user->patronymic,
			'initials'=> $this->initials(),
			'rights'=> $this->auth_role("", "администратор", "редактор"),
			'srole'=> $this->auth_role("", "-admin", "-editor"),
			'role'=> $this->auth_role("", "admin", "editor"),
		];

		return $Role;
	}

	public function auth_role($usr, $adm, $edr)
	{
		return !Auth::user()->is_admin ? $usr : (Auth::user()->is_admin == 1 ? $adm : $edr);
	}

	public function office_info()
	{
		return [
			'phone' => Office::all()->phone,
			'office_num' => Office::all()->office_num,
			'office' => Office::all()->office,
		];
	}

	function initials()
	{
		if (Auth::user()->login == 'admin') return 'admin';
		return Auth::user()->surname.' '.mb_substr(Auth::user()->name, 0, 1).'.'.mb_substr(Auth::user()->patronymic, 0, 1).'.';
	}

	function get_users()
	{
		return User::where([
			['login', '!=', 'admin'],
		]);
	}

	public function get_accesslist() //Перенести в AccessList 
	{
		return ["admin"];
	}

	public static function instance()
	{
		return new ShareInfo();
	}

}