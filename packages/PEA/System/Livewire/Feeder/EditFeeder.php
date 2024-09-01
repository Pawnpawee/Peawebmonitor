<?php

namespace PEA\System\Livewire\Feeder;

use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;
use PEA\App\Models\Feeder;

class EditFeeder extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public Feeder $feeder;

    #[Validate('max:255' , message: 'Please fill not more than 255 characters')]
    #[Validate('required' , message: 'Please fill enter name')]
    public $name;
    public $description;
    public $state = 'draft';

    public function save()
    {

        $this->validate();

        $feeder = $this->feeder;
        $feeder->name = $this->name;
        $feeder->description = $this->description;
        $feeder->state = $this->state;

        $feeder->save();

        $this->closeModal();

        $this->dispatch('feeder-saved');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $feeder = $this->feeder;
        $this->name = $feeder->name;
        $this->description = $feeder->description;
        $this->state = $feeder->state;

        return view('system::livewire.feeder.edit-feeder');
    }
}