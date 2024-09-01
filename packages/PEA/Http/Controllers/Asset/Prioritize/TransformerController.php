<?php

namespace PEA\Http\Controllers\Asset\Prioritize;

use PEA\Http\Controllers\BaseController;

class TransformerController extends BaseController
{
    public function index()
    {
        return view('http::asset.prioritize.transformer.index');
    }
}