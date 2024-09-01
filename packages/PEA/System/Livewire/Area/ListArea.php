<?php

namespace PEA\System\Livewire\Area;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use PEA\App\Models\Area;
use Livewire\Attributes\Url;

class ListArea extends Component
{
    use WithPagination;

    #[Url] 
    public $params;
    public $empty;
    public $increment = 0;

    #[On('area-search')]
    public function search($params)
    {
        $this->params = $params;
    }

    #[On('area-submited')]
    public function onAreaSumited()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('area-saved')]
    public function onAreaSaved()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('area-deleted')]
    public function onAreaDeleted()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('area-reset')]
    public function onAreaReset()
    {
        $this->params = null;
        $this->increment++;
        $this->resetPage();
    }

    public function mount()
    {
        $areas = Area::all();
        
        $this->empty = $areas->isEmpty();

    }

    public function render()
    {
        
    
        $areas = Area::when($searchName = \Arr::get($this->params, 'searchName'), function ($q) use ($searchName) {
            $q->where('name', 'like', '%' . $searchName . '%');
        })
        ->when($searchState = \Arr::get($this->params, 'searchState'), function ($q) use ($searchState ) {
                $q->where('state', 'like', '%' . $searchState . '%');
            })
        ->when($searchWeight = \Arr::get($this->params, 'searchWeight'), function ($q) use ($searchWeight ) {
                $q->where('weight', 'like', '%' . $searchWeight . '%');
            })
            ->orderBy('weight', 'asc')
            ->paginate(10);

            $notfound = $areas->isEmpty();
            
        return view('system::livewire.area.list-area', compact('areas' , 'notfound'));
    }

}
;

