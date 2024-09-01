<?php

namespace PEA\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;

class EventSideBar extends Component
{
    public $microgrids;
    public $filter = [
        'transformer' => '',
        'selectedTransformer' => []
    ];

    public function mount($microgrids){
        $this->microgrids = $microgrids;
    }

    public function render()
    {
        return view('http::livewire.dashboard.event-sidebar');
    }

    #[On('filterClick')]
    public function click($id)//updatedSelectedEvents()
    {
        logger()->debug($this->filter);
        // logger()->debug('click id: '.$id);
        // $transformers = $this->transformers->whereIn('id', [1,2])->toArray();
        // $this->dispatch('dashboard::map.updateMap', $transformers);
    }
}
