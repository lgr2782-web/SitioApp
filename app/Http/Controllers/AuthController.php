<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = Http::post(env('API_URL').'/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->failed()) {
            return back()->withErrors(['login' => 'Credenciales inválidas']);
        }

        Session::put('accessToken', $response->json('accessToken'));

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
