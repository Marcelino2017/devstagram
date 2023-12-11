<?php

namespace App\Http\Controllers\Homes;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        //Obtener a quines seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->paginate(20);
        //dd($posts);
        return view('home', [
            'posts' => $posts,
        ]);
    }
}
