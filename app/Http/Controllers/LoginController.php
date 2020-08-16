<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $user = User::where([
            ['email', '=', $email],
            ['password', '=', $password]
        ])->first();
        if ($user) {
            $login = $user->count();
            if ($login > 0) {
                Session::put('user', $user);
                toastr()->success('Đăng nhập thành công!');
                return redirect()->route('dashboard.index');
            }
        } else {
            Session::put('message', 'Sai email đăng nhập hoặc mật khẩu!');
            return redirect()->route('login.index');
        }
    }

    public function logout()
    {
        Session::put('user', null);
        return redirect()->route('login.index');
    }


}
