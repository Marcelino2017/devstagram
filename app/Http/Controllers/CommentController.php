<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(User $user, Post $post)
    {
        dd("Añadiendo un comentario...");
    }
}
