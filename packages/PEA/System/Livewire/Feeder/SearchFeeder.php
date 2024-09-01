<?php

namespace PEA\System\Livewire\Feeder;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchFeeder extends Component
{
    #[Url]
    public $params = [];

    public function search()
    {
        $this->dispatch('feeder-search', params: $this->params);

    }

    public function reset_search()
    {
        $this->reset();

        $this->dispatch('feeder-reset');
    }


    public function render()
    {
        return view('system::livewire.feeder.search-feeder');

    }

}