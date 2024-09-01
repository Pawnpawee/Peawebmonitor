<?php

namespace PEA\System\Livewire\FeederPhase;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use PEA\App\Models\Feeder;
use PEA\App\Models\FeederPhase;

class ListFeederPhase extends Component
{
    use WithPagination;

    public $feederId;

    #[Url]
    public $params;
    public $empty;
    public $increment = 0;

    #[On('feeder-phase-search')]
    public function search($params)
    {
        $this->params = $params;
    }

    #[On('feeder-phase-submited')]
    public function onFeederPhaseSumited()
    {
        $this->increment++;
        $valueToKeep = $this->feederId;
        $this->reset();
        $this->feederId = $valueToKeep;
     
    }

    #[On('feeder-phase-saved')]
    public function onFeederPhaseSaved()
    {
        $this->increment++;
        $valueToKeep = $this->feederId;
        $this->reset();
        $this->feederId = $valueToKeep;
    }

    #[On('feeder-phase-deleted')]
    public function onFeederPhaseDeleted()
    {
        $this->increment++;
        $valueToKeep = $this->feederId;
        $this->reset();
        $this->feederId = $valueToKeep;
    }

    #[On('feeder-phase-reset')]
    public function onFeederPhaseReset()
    {
        $this->params = null;
        $this->increment++;
        $this->resetPage();
    }

    public function mount()
    {
        $feeder_phases = FeederPhase::when($this->feederId, function ($query) {
            $query->where('feeder_id', $this->feederId);
        })->get();
        
        $this->empty = $feeder_phases->isEmpty();

    }

    public function render()
    {

        $feeder_phases = FeederPhase::
        when(\Arr::get($this->params, 'searchName'), function ($query, $searchName) {
            $query->where('name', 'like', '%' . $searchName . '%');
        })
        ->when(\Arr::get($this->params, 'searchState'), function ($query, $searchState) {
            $query->where('state', 'like', '%' . $searchState . '%');
        })
        ->when($this->feederId, function ($query) {
            $query->where('feeder_id', $this->feederId);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $feeder = Feeder::where('id',$this->feederId)->first();

        $notfound = $feeder_phases->isEmpty();

        return view('system::livewire.feeder-phase.list-phase', compact('feeder_phases' , 'feeder' , 'notfound'));
        
    }

}
;

