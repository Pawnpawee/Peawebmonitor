<?php

namespace PEA\System\Livewire\Feeder;

use LivewireUI\Modal\ModalComponent;
use PEA\App\Models\Feeder;

class DelFeeder extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public $feeder;
    public function delete()
    {

        Feeder::find($this->feeder)->delete();

        $this->closeModal();

        $this->dispatch('feeder-deleted');

    }
    public function close()
    {
        $this->closeModal();
    }


    public function render()
    {
        return view('system::livewire.feeder.del-feeder');
    }
}