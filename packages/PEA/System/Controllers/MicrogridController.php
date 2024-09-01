<?php

namespace PEA\System\Controllers;

use PEA\Http\Controllers\BaseController;
use PEA\App\Models\Microgrid;

class MicrogridController extends BaseController
{
    public function list() 
    {
        
        $microgrid = Microgrid::all();
    
        return view('system::livewire.microgrid.list', compact('microgrid'));

    }
}
