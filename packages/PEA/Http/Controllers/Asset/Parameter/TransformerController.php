<?php

namespace PEA\Http\Controllers\Asset\Parameter;

use PEA\Http\Controllers\BaseController;

class TransformerController extends BaseController
{
    public function index()
    {
        return view('http::asset.parameter.transformer.list.index');
    }

    public function create()
    {
        return view('http::asset.parameter.transformer.form.create');
    }

    public function edit()
    {
        return view('http::asset.parameter.transformer.form.edit');
    }
}