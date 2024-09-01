<?php

namespace PEA\System\Livewire\Feeder;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use PEA\App\Models\Feeder;

class ListFeeder extends Component
{
    use WithPagination;

    #[Url]
    public $params;
    public $empty;
    public $increment = 0;

    #[On('feeder-search')]
    public function search($params)
    {
        $this->params = $params;
    }

    #[On('feeder-submited')]
    public function onFeederSumited()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('feeder-saved')]
    public function onFeederSaved()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('feeder-deleted')]
    public function onFeederDeleted()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('feeder-reset')]
    public function onFeederReset()
    {
        $this->params = null;
        $this->increment++;
        $this->resetPage();
    }

    public function redirectToFeederPhase($feederId)
    {
        return redirect()->route('feeder-phase', ['id' => $feederId]);
    }
    
    public function mount()
    {
        $feeders = Feeder::all();
        
        $this->empty = $feeders->isEmpty();

    }
    public function render()
    {

        $feeders = Feeder::when($searchName = \Arr::get($this->params, 'searchName'), function ($q) use ($searchName) {
            $q->where('name', 'like', '%' . $searchName . '%');
        })
        ->when($searchState = \Arr::get($this->params, 'searchState'), function ($q) use ($searchState ) {
                $q->where('state', 'like', '%' . $searchState . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

            $notfound = $feeders->isEmpty();

        return view('system::livewire.feeder.list-feeder', compact('feeders' , 'notfound'));
    }

   

}
;

