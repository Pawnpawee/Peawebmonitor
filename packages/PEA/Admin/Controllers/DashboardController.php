<?php

namespace PEA\Admin\Controllers;

use PEA\Admin\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('admin::dashboard.index');
    }
}
