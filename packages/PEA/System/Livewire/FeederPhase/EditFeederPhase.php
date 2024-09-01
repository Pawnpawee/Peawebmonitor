<?php

namespace PEA\System\Livewire\FeederPhase;

use LivewireUI\Modal\ModalComponent;
use PEA\App\Models\FeederPhase;

class EditFeederPhase extends ModalComponent
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



    public function save()
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

        $feeder_phase = $this->feeder_phase;
        $feeder_phase->name = $this->name;
        $feeder_phase->lat_long_json = $this->lat_long_json;
        $feeder_phase->description = $this->description;
        $feeder_phase->state = $this->state;
        $feeder_phase->feeder_id = $this->feeder_id;

        $feeder_phase->save();

        $this->closeModal();

        $this->dispatch('feeder-phase-saved');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function mount(){

        $feeder_phase = $this->feeder_phase;
        $this->lat_long_json = $feeder_phase->lat_long_json;
    }

    public function render()
    {
        $feeder_phase = $this->feeder_phase;
        $this->name = $feeder_phase->name;
        $this->description = $feeder_phase->description;
        $this->state = $feeder_phase->state;

        return view('system::livewire.feeder-phase.edit-phase');
    }
}