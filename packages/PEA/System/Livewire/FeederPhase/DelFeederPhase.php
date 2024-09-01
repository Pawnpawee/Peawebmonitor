<?php

namespace PEA\System\Livewire\FeederPhase;

use LivewireUI\Modal\ModalComponent;
use PEA\App\Models\FeederPhase;

class DelFeederPhase extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public $feeder_phase;
    public function delete()
    {
        FeederPhase::find($this->feeder_phase)->delete();

        $this->closeModal();

        $this->dispatch('feeder-phase-deleted');

    }
    public function close()
    {
        $this->closeModal();
    }


    public function render()
    {
        return view('system::livewire.feeder-phase.del-phase');
    }
}