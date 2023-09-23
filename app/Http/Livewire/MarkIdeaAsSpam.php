<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MarkIdeaAsSpam extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    
    public function markAsASpam()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        $this->idea->spam_reports++;
        $this->idea->save();
        $this->emit('IdeaWasMarkedAsASpam','Idea Was Updated As A Spam');
    }

    public function render()
    {
        return view('livewire.mark-idea-as-spam');
    }
}
