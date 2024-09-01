<?php

namespace PEA\System\Livewire\Microgrid;

use PEA\App\Models\Microgrid;
use LivewireUI\Modal\ModalComponent;

class ViewGrid extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public Microgrid $microgrid;
    public $name;
    public $description;
    public $latitude;
    public $longitude;
    public $state;


    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $microgrid = $this->microgrid;
        $this->name = $microgrid->name;
        $this->description = $microgrid->description;
        $this->latitude = $microgrid->latitude;
        $this->longitude = $microgrid->longitude;
        $this->state = $microgrid->state;

        return view('system::livewire.microgrid.view-grid');
    }
}