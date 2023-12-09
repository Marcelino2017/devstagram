<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Intervention\Image\Facades\Image;

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

        if ($request->image) {
            $image = $request->file('image');

            $imageName = Str::uuid().".".$image->extension();

            $imageServer = Image::make($image);
            $imageServer->fit(1000,1000);

            $imagePath = public_path('profiles').'/'.$imageName;
            $imageServer->save($imagePath);
        }

        $user = User::find(auth()->user()->id);

        $user->username = $request->username;
        $user->image = $imageName ?? auth()->user()->image ?? null;
        $user->save();

        return redirect()->route('posts.index', $user->username);

    }
}
