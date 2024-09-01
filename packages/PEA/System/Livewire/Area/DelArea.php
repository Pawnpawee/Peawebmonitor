<?php

namespace PEA\System\Livewire\Area;

use PEA\App\Models\Area;
use LivewireUI\Modal\ModalComponent;

class DelArea extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public $area;
    public function delete()
    {
    
        Area::find($this->area)->delete();
          
        $this->closeModal();
        
        $this->dispatch('area-deleted');
        
    }
    public function close()
    {
        $this->closeModal();
    }


    public function render()
    {
        return view('system::livewire.area.del-area');
    }
}