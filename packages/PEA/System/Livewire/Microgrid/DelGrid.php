<?php

namespace PEA\System\Livewire\Microgrid;

use PEA\App\Models\Microgrid;
use LivewireUI\Modal\ModalComponent;

class DelGrid extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public $microgrid;
    public function delete()
    {
    
        Microgrid::find($this->microgrid)->delete();
          
        $this->closeModal();
        
        $this->dispatch('microgrid-deleted');
        
    }
    public function close()
    {
        $this->closeModal();
    }


    public function render()
    {
        return view('system::livewire.microgrid.del-grid');
    }
}