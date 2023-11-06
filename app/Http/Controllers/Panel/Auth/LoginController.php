<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('panel.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['is_active'] = true;
        if (auth()->attempt($credentials, $request->has('remember'))) {
            return redirect()->route('panel.index');
        }
        $message = trans('auth.failed');
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => $message,
            'password' => $message
        ]);
    }
}
