<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username'=>  Str::slug($request->username)]);
        $this->validate($request, [
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:30', 'not_in:twitter,edit-profile'],
        ]);

        dd("hola..");
        //return back();
    }
}
