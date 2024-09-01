<?php

namespace PEA\System\Livewire\FeederPhase;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchFeederPhase extends Component
{
    #[Url]
    public $params = [];

    public $feederId;

    public function search()
    {
        $this->dispatch('feeder-phase-search', params: $this->params);

    }

    public function reset_search()
    {
        $this->reset();

        $this->dispatch('feeder-phase-reset');
    }


    public function render()
    {
        $feeder_id = $this->feederId;

        return view('system::livewire.feeder-phase.search-phase', compact('feeder_id'));

    }

}