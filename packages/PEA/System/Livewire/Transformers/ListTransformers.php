<?php

namespace PEA\System\Livewire\Transformers;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use PEA\App\Models\Transformer;
use Livewire\Attributes\Url;

class ListTransformers extends Component
{
    use WithPagination;

    #[Url]
    public $params;
    public $empty;
    public $increment = 0;

    #[On('transformer-search')]
    public function search($params)
    {
        $this->params = $params;
    }

    #[On('transformer-submited')]
    public function onTransformerSumited()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('transformer-saved')]
    public function onTransformerSaved()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('transformer-deleted')]
    public function onTransformerDeleted()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('transformer-reset')]
    public function onTransformerReset()
    {
        $this->params = null;
        $this->increment++;
        $this->resetPage();
    }

    public function mount()
    {
        $transformers = Transformer::all();
        
        $this->empty = $transformers->isEmpty();

    }

    public function render()
    {
        $transformers = Transformer::when($searchMicrogrid = \Arr::get($this->params, 'searchMicrogrid'), function ($query, $searchMicrogrid) {
            $query->whereHas('microgrid', function ($q) use ($searchMicrogrid) {
                $q->where('name', 'like', '%' . $searchMicrogrid . '%');
        });
        })
        ->when($searchName = \Arr::get($this->params, 'searchName'), function ($q) use ($searchName) {
            $q->where('name', 'like', '%' . $searchName . '%');
        })
        ->when(strlen(\Arr::get($this->params,'searchLongitude')), function ($q){
            $searchLongitude = \Arr::get($this->params,'searchLongitude');
                $q->where('longitude', 'like', '%' . $searchLongitude . '%');
            })
        ->when(strlen(\Arr::get($this->params,'searchLatitude')), function ($q) {
            $searchLatitude = \Arr::get($this->params,'searchLatitude');
                $q->where('latitude', 'like', '%' . $searchLatitude . '%');
            })
        ->when($searchState = \Arr::get($this->params, 'searchState'), function ($q) use ($searchState ) {
                $q->where('state', 'like', '%' . $searchState . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

            $notfound = $transformers->isEmpty();

        return view('system::livewire.transformers.list-transformer', compact('transformers' , 'notfound'));
    }

}
;