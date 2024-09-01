<?php

namespace PEA\System\Livewire\Feeder;

use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;
use PEA\App\Models\Feeder;

class AddFeeder extends ModalComponent
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

    public function submit()
    {

        $this->validate();

        Feeder::create([
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state
        ]);


        $this->closeModal();

        $this->dispatch('feeder-submited');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $feeder = Feeder::all();

        return view('system::livewire.feeder.add-feeder', compact('feeder'));
    }
}