<?php

namespace PEA\System\Livewire\Notification;

use PEA\App\Models\Notification;
use LivewireUI\Modal\ModalComponent;

class DelNoti extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public $noti;
    public function delete()
    {
    
        Notification::find($this->noti)->delete();
          
        $this->closeModal();
        
        $this->dispatch('noti-deleted');
        
    }
    public function close()
    {
        $this->closeModal();
    }


    public function render()
    {
        return view('system::livewire.notification.del-noti');
    }
}