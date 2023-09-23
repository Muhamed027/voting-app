<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Http\Response;

class AddComment extends Component
{

    public $idea;
    public $comment;    

    protected $rules = [
        'comment' => 'required|min:8'
    ];
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function addComment()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        $this->validate($this->rules);
        Comment::create([
            'user_id'=>auth()->id(),
            'idea_id'=>$this->idea->id,
            'body'=>$this->comment,
        ]);
        $this->reset();
        $this->emit("CommentWasAdded","Comment Was added succefully");
    }
    public function render()
    {
        return view('livewire.add-comment');
    }
}
