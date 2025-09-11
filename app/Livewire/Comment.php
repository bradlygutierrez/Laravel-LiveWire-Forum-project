<?php

namespace App\Livewire;
use Illuminate\Database\Eloquent\Model;

use Livewire\Component;

class Comment extends Component
{
     public Model $commentable;
     public bool $showCommentForm = false;

     public string $content = '';

     public function add()
     {
         $this->validate([
             'content' => 'required|string|max:255',
         ]);

         $this->commentable->comments()->create([
             'user_id' => 20,
             'content' => $this->content,
         ]);

         $this->reset(['content', 'showCommentForm']);
     }
     public function toggleCommentForm()
     {
         $this->showCommentForm = !$this->showCommentForm;
     }
    public function render()
    {
        return view('livewire.comment', [
            'comments' => $this->commentable->comments()->with('user')->latest()->get(),
        ]);

    }
}
