<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('login.register');
    }

    public function register(Request $request) {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required|in:donor,recipient',
        ]);

        // dd($validate);

        User::create($validate);

    
        return redirect('/login');
    }
}
