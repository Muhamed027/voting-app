<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MarkIdeaAsNotSpam extends Component
{
    public $idea;

    public function mount(Idea $idea){
        $this->idea=$idea;
    }
    public function resetCounter(){
        if (auth()->guest()||!Auth::user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        $this->idea->spam_reports=0;
        $this->idea->save();
        $this->emit('IdeaWasMarkedAsNotSpam','Idea Was Marked As Not  Spam');
    }
    public function render()
    {
        return view('livewire.mark-idea-as-not-spam');
    }
}
 