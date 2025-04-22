<?php

namespace App\Http\Controllers;

use App\Http\Requests\USerAuthVerifyRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() : View
    {
        return view('auth.login');
    }
    public function verify(USerAuthVerifyRequest $request) : RedirectResponse
    {
       $data = $request->validated();

       if (Auth::attempt([
        'email' => $data['email'],
        'password' => $data['password'],
    ])) {
        $request->session()->regenerate();
    
        // Cek role dan redirect sesuai
        return match (Auth::user()->role) {
            'siswa' => redirect()->route('siswa.dashboard'),
            'guru' => redirect()->route('guru.dashboard'),
            'operator' => redirect()->route('operator.dashboard'),
            'orangtua' => redirect()->route('orangtua.dashboard'),
            default => abort(403),
        };
    }
    return back()->with('msg', 'Email atau password salah');
    
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect(route('login'));
    }

}