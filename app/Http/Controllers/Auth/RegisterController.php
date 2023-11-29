<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;
use DragonCode\Support\Facades\Helpers\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        User::create([
            'name'     => $request->name,
            'username' => Str::slug($request->username),
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
