<?php

namespace PEA\System\Livewire\Microgrid;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchGrid extends Component
{
    #[Url]
    public $params = [];

    public function search()
    {
        $this->dispatch('table-search', params: $this->params);

    }

    public function reset_search()
    {
        $this->reset();

        $this->dispatch('microgrid-reset');
    }


    public function render()
    {
        return view('system::livewire.microgrid.search-grid');

    }

}