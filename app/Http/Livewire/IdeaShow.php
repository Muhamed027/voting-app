<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class IdeaShow extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;


    protected $listeners=['statusWasUpdated','IdeaWasUpdated','IdeaWasMarkedAsASpam','IdeaWasMarkedAsNotSpam','CommentWasAdded'];
    
    public function mount(Idea $idea,$votesCount){
        $this->idea=$idea;

        $this->votesCount=$votesCount;


        $this->hasVoted=$idea->isVotedByUser(auth()->user());

    }

    public function statusWasUpdated(){
        $this->idea->refresh();
    }
    public function IdeaWasUpdated(){
        $this->idea->refresh();
    }
    public function IdeaWasMarkedAsASpam(){
        $this->idea->refresh();
    }
    
    public function IdeaWasMarkedAsNotSpam(){
        $this->idea->refresh();
    }
    public function CommentWasAdded(){
        $this->idea->refresh();
    }

    public function vote()
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        if ($this->hasVoted) {
            $this->idea->removeVote(Auth::user());
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            $this->idea->vote(Auth::user());
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }





    public function render()
    {
        return view('livewire.idea-show');
    }
}
