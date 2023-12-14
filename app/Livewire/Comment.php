<?php

namespace App\Livewire;

use App\Models\Comment as ModelsComment;
use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $post;
    public $user;
    public $prueba;
    protected $rules = [
        'comment' => 'required|max:255'
    ];
    public function mount($post)
    {
       $this->post = $post;
    }

    public function saveComment()
    {
        $this->validate();

        ModelsComment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comment' => $this->comment,
        ]);

        // Limpiar el campo después de guardar el comentario
        $this->comment = '';
        session()->flash('message', 'Comentario Realizado Correctamente.');

    }

    public function destroyComment($commentId)
    {
        $comment = ModelsComment::find($commentId);

        if ($comment) {
            $comment->delete();
            session()->flash('message', 'Comentario eliminado con éxito.');
        }
    }

    public function render()
    {
        $comments = $this->post->comments()->orderBy('created_at', 'desc')->get();
        return view('livewire.comment', ['comments' => $comments]);
    }
}
