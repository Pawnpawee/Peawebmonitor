<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class LineController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.line.list.index');
    }
}