<?php

namespace PEA\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;

class Map extends Component
{

    //lat, lng -- Bangkok
    public $lat = 13.5904882;
    public $lng = 100.5993042;

    public function render()
    {
        return view('http::livewire.dashboard.map');
    }

    public function getData()
    {
        // $coordinates = [
        //     "line1" => [
        //         [ 37.772, -122.214 ],
        //         [ 21.291, -157.821 ],
        //         [ -18.142, 178.431 ],
        //         [ -27.467, 153.027 ],
        //     ],

        //     "line2" => [
        //         [ 47.772, -112.214 ],
        //         [ 31.291, -147.821 ],
        //         [ -8.142, 188.431 ],
        //         [ -17.467, 163.027 ],
        //     ],

        //     "line3" => [
        //         [ 57.772, -102.214 ],
        //         [ 41.291, -137.821 ],
        //         [ -8.142, 198.431 ],
        //         [ -7.467, 173.027 ],
        //     ]
        // ];

        // $this->dispatch('GoogleMapRender', compact('coordinates'));
    }

    #[On('dashboard::map.updateMap')]
    public function updateMap($transformers){
        logger()->debug('updateMap');

        $this->dispatch('GoogleMapRender', transformers: $transformers);
    }
}
