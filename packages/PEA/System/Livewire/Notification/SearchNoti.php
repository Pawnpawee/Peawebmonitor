<?php

namespace PEA\System\Livewire\Notification;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchNoti extends Component
{
    #[Url]
    public $params = [];

    public function search()
    {
        $this->dispatch('noti-search', params: $this->params);

    }

    public function reset_search()
    {
        $this->reset();

        $this->dispatch('noti-reset');
    }


    public function render()
    {
        return view('system::livewire.notification.search-noti');

    }

}