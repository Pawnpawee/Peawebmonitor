<?php

namespace PEA\System\Livewire\Area;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchArea extends Component
{
    #[Url]
    public $params = [];

    public function search()
    {
        $this->dispatch('area-search', params: $this->params);

    }

    public function reset_search()
    {
        $this->reset();

        $this->dispatch('area-reset');
    }


    public function render()
    {
        return view('system::livewire.area.search-area');

    }

}