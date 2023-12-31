<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaIndex extends Component
{

    public $idea;
    public $votesCount;
    public $hasVoted;

    public function vote(){
        if(!auth()->check()){
            return redirect('/login');
        }
        if($this->hasVoted){
            $this->idea->removeVote(auth()->user());
            $this->votesCount--;
            $this->hasVoted=false;
        }else{
            $this->idea->vote(auth()->user());
            $this->votesCount++;
            $this->hasVoted=true;
        }
        // $this->emit('votesUpdated', $this->votesCount);
    }

    public function mount(Idea $idea,$votesCount){

        $this->idea=$idea;
        $this->votesCount=$votesCount;
        $this->hasVoted=$idea->voted_by_user  ;
    }
    
    public function render()
    {
        return view('livewire.idea-index');
    }
}
