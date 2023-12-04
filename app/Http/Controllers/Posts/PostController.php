<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostStoreRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('dashboar',[
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostStoreRequest $request)
    {
        Post::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $request->image,
            'user_id'     => auth()->user()->id,
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
