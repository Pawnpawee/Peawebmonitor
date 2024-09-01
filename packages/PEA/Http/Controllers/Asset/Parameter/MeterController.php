<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class MeterController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.meter.list.index');
    }
}