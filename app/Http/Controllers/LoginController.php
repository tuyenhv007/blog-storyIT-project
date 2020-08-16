<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function registerIndex()
    {
        return view('admin.user.register');
    }

    public function register(RegisterRequest $registerRequest)
    {
        $user = new User();
        $user->name = $registerRequest->name;
        $user->email = $registerRequest->email;
        $user->password = md5($registerRequest->pass);
        $user->re_pass = md5($registerRequest->re_pass);
        $user->save();
        toastr()->success('Đăng ký thành công, mời bạn đăng nhập!');
        return redirect()->route('login.index');

    }

    public function loginIndex()
    {
        return view('admin.user.login');
    }


}
