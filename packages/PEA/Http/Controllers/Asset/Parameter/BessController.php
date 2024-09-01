<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class BessController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.bess.list.index');
    }
}