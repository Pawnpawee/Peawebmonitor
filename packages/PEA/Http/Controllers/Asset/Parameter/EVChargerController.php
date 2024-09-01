<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class EVChargerController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.ev-charger.list.index');
    }
}