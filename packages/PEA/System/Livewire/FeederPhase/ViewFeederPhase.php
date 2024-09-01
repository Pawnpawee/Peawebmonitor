<?php

namespace PEA\System\Livewire\FeederPhase;

use LivewireUI\Modal\ModalComponent;
use PEA\App\Models\FeederPhase;

class ViewFeederPhase extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public FeederPhase $feeder_phase;

    public $name;
    public $description;
    public $lat_long_json = [];
    public $state;

    public function close()
    {
        $this->closeModal();
    }


    public function render()
    {
        $feeder_phase = $this->feeder_phase;
        $this->name = $feeder_phase->name;
        $this->lat_long_json = $feeder_phase->lat_long_json;
        $this->description = $feeder_phase->description;
        $this->state = $feeder_phase->state;

        return view('system::livewire.feeder-phase.view-phase');
    }
}