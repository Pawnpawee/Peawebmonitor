<?php

namespace PEA\System\Livewire\Notification;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use PEA\App\Models\Notification;
use Livewire\Attributes\Url;

class ListNoti extends Component
{
    use WithPagination;

    #[Url]
    public $params;
    public $increment = 0;

    #[On('noti-search')]
    public function search($params)
    {
        $this->params = $params;
    }

    #[On('noti-submited')]
    public function onNotiSumited()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('noti-saved')]
    public function onNotiSaved()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('noti-deleted')]
    public function onNotiDeleted()
    {
        $this->increment++;
        $this->reset();
    }

    #[On('noti-reset')]
    public function onNotiReset()
    {
        $this->params = null;
        $this->increment++;
        $this->resetPage();
    }

    public function render()
    {
        $notis = Notification::when($searchName = \Arr::get($this->params, 'searchName'), function ($q) use ($searchName) {
            $q->where('name', 'like', '%' . $searchName . '%');
        })
        ->when(strlen(\Arr::get($this->params,'searchSubject')), function ($q){
            $searchSubject = \Arr::get($this->params,'searchSubject');
                $q->where('subject', 'like', '%' . $searchSubject . '%');
            })
        ->when(strlen(\Arr::get($this->params,'searchType')), function ($q) {
            $searchType = \Arr::get($this->params,'searchType');
                $q->where('Type', 'like', '%' . $searchType . '%');
            })
        ->when($searchState = \Arr::get($this->params, 'searchState'), function ($q) use ($searchState ) {
                $q->where('state', 'like', '%' . $searchState . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('system::livewire.notification.list-noti', compact('notis'));
    }

}
;