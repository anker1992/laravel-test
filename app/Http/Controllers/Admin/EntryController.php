<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EntryController extends Controller
{

    public function index() {
        return '后台.....';
    }

    /**
     * 登录视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginForm(){
        return view('admin/entry/login');
    }

    /**
     * 登录认证
     */
    public function login(Request $request) {
        $status = Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);

        if ($status) {
            //登录成功
            return redirect('/admin/index');
        }
        return redirect('/admin/login')->with('error', '用户名或密码错误');
    }
}
