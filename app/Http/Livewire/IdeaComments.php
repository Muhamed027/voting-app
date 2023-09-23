<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;
    public  $idea;
    protected $listeners = ['CommentWasAdded'];
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function CommentWasAdded()
    {
        $this->idea->refresh();
    }


    public function render()
    {
        return view('livewire.idea-comments', [
            'comments' => $this->idea
                ->comments()
                ->with('author')
                ->simplePaginate(15)
                ->withQueryString()
        ]);
    }
}
