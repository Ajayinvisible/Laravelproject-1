<?php

namespace App\Http\Controllers\Frontend\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public $frontendPath = 'frontend.';
    public $frontendPagePath = 'frontend.pages';

    public function index(){
        return view($this->frontendPagePath.'frontend.homePage.index');
    }
}
