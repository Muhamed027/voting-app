<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdeaStatusUpdatedMailable;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $notifyAllVoters;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }


    public function notifyAllVoters()
    {
        $this->idea->votes()
            ->select()
            ->chunk(4,function($voters){
                foreach($voters as $user){
                    //send email to all of this users 
                    Mail::to($user)->queue(new IdeaStatusUpdatedMailable($this->idea));
                }
            });
    }




    public function setStatus()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        $this->idea->status_id = $this->status;
        $this->idea->save();
        $this->emit('statusWasUpdated');
        if ($this->notifyAllVoters) {
            $this->notifyAllVoters();
        }
    }
    public function render()
    {
        return view('livewire.set-status');
    }
}
