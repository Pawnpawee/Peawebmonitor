<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class CBController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.cb.list.index');
    }
}