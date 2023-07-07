<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    public $status;
    public $status_count;





    public function mount()
    {
        $this->status_count = (new Status())->get_count();
        $this->status = request()->status ?? 'All'; 
        if (Route::currentRouteName() === 'Idea.show') {
            $this->status = NULL;
        }
    }
    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->emit('queryStringUpdatedStatus', $this->status);
        if ($this->getPreviousRouteName() === 'Idea.show') {
            return redirect()->route('Idea.index', [
                'status' => $this->status
            ]);
        }
    }
    private function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
