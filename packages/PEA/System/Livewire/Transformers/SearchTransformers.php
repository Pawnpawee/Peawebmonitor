<?php

namespace PEA\System\Livewire\Transformers;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchTransformers extends Component
{
    #[Url]
    public $params = [];

    public function search()
    {
        $this->dispatch('transformer-search', params: $this->params);

    }

    public function reset_search()
    {
        $this->reset();

        $this->dispatch('transformer-reset');
    }


    public function render()
    {
        return view('system::livewire.transformers.search-transformer');

    }

}