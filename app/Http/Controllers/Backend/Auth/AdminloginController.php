<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminloginController extends Controller
{
    private $backendPath = 'backend.';
    protected $backendPagePath = 'backend.pages';

    public function index(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('dashboard')->with('error','You are already login to dashboard');
        }else{
            return view ($this->backendPath.'.auth.login');
        }
    }

    public function login(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        $userName = $request->username;
        $password = $request->password;

        if(Auth::guard('admin')->attempt(['username' => $userName, 'password'=>$password])){
            return redirect()->route('dashboard')->with('success','login successfuly');
        }else{
            return back()->with('error','Login failed');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login')->with('success','Logout successfuly');
    }
}
