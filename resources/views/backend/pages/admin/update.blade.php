@extends('backend.master.master')
@section('content')
  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          @include('helper.message')
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title">Update Admin Data &nbsp;<i class="fa-solid fa-pen-to-square"></i>
                          <a href="{{route('admin.index')}}" class="btn btn-primary float-end"><i class="fa-solid fa-eye"></i> &nbsp;Show Admins</a>
                        </h5>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <form action="{{route('admin.update',$adminData->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name : 
                                            <a class="text-danger">{{$errors->first('name')}}</a>
                                        </label>
                                        <input type="text" name="name" id="name" value="{{$adminData->name ?? old('name')}}" class="form-control">
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username :
                                            <a class="text-danger">{{$errors->first('username')}}</a>
                                        </label>
                                        <input type="text" name="username" id="username" value="{{$adminData->username ?? old('username')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :
                                    <a class="text-danger">{{$errors->first('email')}}</a>
                                </label>
                                <input type="email" name="email" id="email" value="{{$adminData->email ?? old('email')}}" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="gender" class="form-label">Gender :
                                        <a class="text-danger">{{$errors->first('gender')}}</a>
                                      </label>
                                      <select name="gender" id="gender" class="form-control">
                                        <option name="gender" value="male" {{$adminData->gender=="male" ? 'selected' : ''}}>Male</option>
                                        <option name="gender" value="female" {{$adminData->gender=="female" ? 'selected' : ''}}>Female</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="role" class="form-label">Role :
                                        <a class="text-danger">{{$errors->first('role')}}</a>
                                      </label>
                                      <select name="role" id="role" class="form-control">
                                        <option value="admin" {{$adminData->role=="admin" ? 'selected' : ''}}>Admin</option>
                                        <option value="super_admin" {{$adminData->role=="super_admin" ? 'selected' : ''}}>Super Admin</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                              <label for="image" class="form-label">Choose Profile Picture</label>
                              <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <button class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </main>
@endsection