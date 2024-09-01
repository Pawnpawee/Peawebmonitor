<?php

namespace PEA\System\Livewire\FeederPhase;

use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;
use PEA\App\Models\FeederPhase;

class AddFeederPhase extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public FeederPhase $feeder_phase;

    public $name;
    public $description;
    public $lat_long_json = [];
    public $latitude;
    public $longitude;
    public $state = 'draft';
    public $feeder_id;

    public function addPair()
    {
        $this->validate([
            'latitude' => ['required', 'numeric', 'regex:/^(\+|-)?([1-8]?\d(\.\d+)?|90(\.0+)?)$/'],
            'longitude' => ['required', 'numeric', 'regex:/^(\+|-)?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/'],
        ], [
            'latitude.required' => 'Please fill enter latitude',
            'latitude.numeric' => 'Please fill number latitude',
            'latitude.regex' => 'Please fill correct format latitude',
            'longitude.required' => 'Please fill enter longitude',
            'longitude.numeric' => 'Please fill number longitude',
            'longitude.regex' => 'Please fill correct format longitude',
        ]);

        $this->lat_long_json[] = [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];

        $this->latitude = '';
        $this->longitude = '';
    }

    public function removePair($index)
    {
        if (isset($this->lat_long_json[$index])) {
            array_splice($this->lat_long_json, $index, 1);
        }
    }

    public function submit()
    {       

        $this->validate([
            'name' => 'required',
            'lat_long_json' => ['required', 'array', 'min:1'],
            'lat_long_json.*.latitude' => ['required', 'numeric', 'regex:/^(\+|-)?([1-8]?\d(\.\d+)?|90(\.0+)?)$/'],
            'lat_long_json.*.longitude' => ['required', 'numeric', 'regex:/^(\+|-)?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/'],
        ], [
            'name.required' => 'Please fill enter name',
            'lat_long_json.required' => 'Please fill enter 1 pair',
            'lat_long_json.min' => 'Please fill enter 1 pair',
            'lat_long_json.*.latitude.required' => 'Please fill enter latitude',
            'lat_long_json.*.latitude.numeric' => 'Please fill number latitude',
            'lat_long_json.*.latitude.regex' => 'Please fill correct format latitude',
            'lat_long_json.*.longitude.required' => 'Please fill enter longitude',
            'lat_long_json.*.longitude.numeric' => 'Please fill number longitude',
            'lat_long_json.*.longitude.regex' => 'Please fill correct format longitude',
        ]);

        FeederPhase::create([
            'name' => $this->name,
            'description' => $this->description,
            'lat_long_json' => $this->lat_long_json,
            'state' => $this->state,
            'feeder_id' => $this->feeder_id,
        ]);
       

        $this->closeModal();

        $this->dispatch('feeder-phase-submited');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('system::livewire.feeder-phase.add-phase');
    }
}
