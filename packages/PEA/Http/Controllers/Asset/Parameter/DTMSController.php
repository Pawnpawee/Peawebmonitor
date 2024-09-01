<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class DTMSController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.dtms.list.index');
    }
}