<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class ArrestorController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.arrestor.list.index');
    }
}