<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
class BackendController extends Controller {
	public function index() {
		// dump((Auth::guard('admin')->check()));
		// 	dd(	Auth::guard('admin')->user());
		// dd((Auth::guard('user')->check()));

		return view('backend.index');
	}
	public function login() {
		// Admin::create([
		// 	'name' => 'admin2',
		// 	'email' => 'tranhoan.dz@geail.com',
		// 	'password' => bcrypt('123456'),
		// ]);
		return view('backend.login');
	}
	public function postLogin(Request $req) {
		// dump($req->all());
		// dd(Auth::guard('admin')->attempt($req->only('name','password')));
		if (Auth::guard('admin')->attempt($req->only('name', 'password'))) {
			return redirect()->route('backend')->with('success', 'Đăng nhập thành công');
		} else {
			return redirect()->back()->with('error', 'Đăng nhập thất bại');
		}

		return;
	}
	public function logout(Request $req) {
		Auth::guard('admin')->logout();
		return redirect()->route('login')->with('success', 'Đăng xuất thành công');
	}
}
?>