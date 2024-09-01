<?php

namespace PEA\Http\Controllers;

use PEA\App\Models\Transformer;
use PEA\App\Models\Microgrid;

class DashboardController extends BaseController
{
    public function index()
    {
        $microgrids = Microgrid::where('state', 'draft')->with('transformers')->get();
        //$transformers = Transformer::where('state', 'draft')->get();

        return view('http::dashboard.index', compact('microgrids'));
    }
}
