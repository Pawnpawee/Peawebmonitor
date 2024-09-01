<?php

namespace PEA\System\Livewire\Microgrid;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use PEA\App\Models\Microgrid;
use Livewire\Attributes\Url;

class TableGrid extends Component
{
    use WithPagination;

    #[Url] 
    public $params;
    public $empty;
    public $increment = 0;

    #[On('table-search')]
    public function search($params)
    {
        $this->params = $params;
    }

    #[On('microgrid-submited')]
    public function onMicrogridSumited()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('microgrid-saved')]
    public function onMicrogridSaved()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('microgrid-deleted')]
    public function onMicrogridDeleted()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('microgrid-reset')]
    public function onMicrogridReset()
    {
        $this->params = null;
        $this->increment++;
        $this->resetPage();
    }

    public function mount()
    {
        $microgrids = Microgrid::all();
        
        $this->empty = $microgrids->isEmpty();

    }

    public function render()
    {
        
    
        $microgrids = Microgrid::when($searchName = \Arr::get($this->params, 'searchName'), function ($q) use ($searchName) {
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

            $notfound = $microgrids->isEmpty();
            
        return view('system::livewire.microgrid.table-grid', compact('microgrids' , 'notfound'));
    }

}
;

