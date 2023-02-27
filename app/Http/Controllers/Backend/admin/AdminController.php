<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Admin\AdminGallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    private $backendPath = 'backend.';
    protected $backendPagePath = 'backend.pages.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authId = Auth::guard('admin')->user()->id;
        $adminData = Admin::where('id','!=',$authId)->orderBy('id','desc')->paginate(5);
        return view ($this->backendPagePath.'admin.index', compact('adminData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ($this->backendPagePath.'admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
            'username'=>'required|min:3|max:50|unique:admins,username',
            'email'=>'required|email|unique:admins,email',
            'gender'=>'required',
            'role'=>'required',
            'password'=>'required|min:8|max:16',
            'password_confirmation'=>'required|same:password'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $response = Admin::create($data);
        if($response){
            if($request->hasFile('image')){
                $insertData['admin_id'] = $response->id;
                $insertData['image']=$this->singleFileUpload('uploads/admins');
                AdminGallery::create($insertData);
                return redirect()->route('admin.index')->with('success','Admin Created succesfully');
            }else{
                return redirect()->back()->with('success','Admin Created Successfully');
            }
        }else{
            return redirect()->back()->with('error','Something went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adminData = Admin::FindOrFail($id);
        return view ($this->backendPagePath.'admin.show',compact('adminData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminData = Admin::FindOrFail($id);
        return view($this->backendPagePath.'admin.update',compact('adminData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
            'username'=>'required|min:3|max:50|unique:admins,username,'. $id .'id',
            'email'=>'required|email|unique:admins,email,'. $id .'id',
            'gender'=>'required',
            'role'=>'required',
        ]);
        $data = $request->all();
        $response = Admin::FindOrFail($id)->update($data);
        if($response){
            if($request->hasFile('image')){
                $insertData['admin_id'] = $id;
                $insertData['image']=$this->singleFileUpload('uploads/admins');
                AdminGallery::create($insertData);
                return redirect()->route('admin.index')->with('success','Admin Updated succesfully');
            }else{
                return redirect()->route('admin.index')->with('success','Admin Updated Successfully');
            }
        }else{
            return redirect()->back()->with('error','Something went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findImage = AdminGallery::where('admin_id',$id)->get();
        if($findImage){
            foreach($findImage as $image){
                $this->deleteFile($image->image);
            }
        }
        AdminGallery::where('admin_id',$id)->delete();
            Admin::findOrFail($id)->delete();
            return redirect()->back()->with('success','Admin deleted succesfully');
    }

    public function changePassword(Request $request){
        if($request->isMethod('get')){
            return view($this->backendPagePath . '/admin.change-password');
        }
        if($request->isMethod('post')){
            $adminUser=Auth::guard('admin')->user();
            $oPass = $adminUser->password;
            $this->validate($request, [
                'old_password'=>'required|old_password'.$oPass,
                'password'=>'required|min:8|max:16',
                'password_confirmation'=>'required|same:password'
            ],[
                'old_password.old_password'=>'old password not match'
            ]);
            $data = $request->only('password');
            $data['password'] = bcrypt($request->password);
            if($adminUser->update($data)){
                return redirect()->back()->with('success', 'Password updated successfully');
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }
        }
        return redirect()->back()->with('error','Something went wrong');
    }
}