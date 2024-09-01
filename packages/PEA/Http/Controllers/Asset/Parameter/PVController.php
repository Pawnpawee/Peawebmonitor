<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class PVController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.pv.list.index');
    }
}