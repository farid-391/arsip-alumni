<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        // $email = 'johndoe@test.test';
        // $password = 'Bismillah123';
        
        $response = json_decode(Http::asForm()->post('https://shielded-headland-74924.herokuapp.com/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]));

        $token = $response->access_token;
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/jumlah/siswa"));
        $posts2 = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/jumlah/prestasi"));
        // dd($response);
        return view('pages.admin.index', compact('token', 'posts', 'posts2'));

    }
}
?>