<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $backendPath = 'backend.';
    protected $backendPagePath = 'backend.pages.';

    public function index(){
        return view($this->backendPagePath.'.dashboard.index');
    }
}
