<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function index(Request $request)
    {
        if ('GET' == $request->method()) {
            return view('login');
        }
        if ('POST' == $request->method()) {
            $data['email'] = $request->email;
            $data['password'] = $request->password;

            if (auth()->attempt($data)) {
                return redirect('dashboard');
            }
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}