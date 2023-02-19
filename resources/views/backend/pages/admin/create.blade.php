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
                        <h5 class="card-title">Register Admin &nbsp;<i class="fa-solid fa-user-plus"></i>
                          <a href="{{route('admin.index')}}" class="btn btn-primary float-end"><i class="fa-solid fa-eye"></i> &nbsp;Show Admins</a>
                        </h5>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name : 
                                            <a class="text-danger">{{$errors->first('name')}}</a>
                                        </label>
                                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username :
                                            <a class="text-danger">{{$errors->first('username')}}</a>
                                        </label>
                                        <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :
                                    <a class="text-danger">{{$errors->first('email')}}</a>
                                </label>
                                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="gender" class="form-label">Gender :
                                        <a class="text-danger">{{$errors->first('gender')}}</a>
                                      </label>
                                      <select name="gender" id="gender" class="form-control">
                                        <option value="" selected readonly>----Select Gender----</option>
                                        <option name="gender" value="male" {{old('gender')=="male" ? 'selected' : ''}}>Male</option>
                                        <option name="gender" value="female" {{old('gender')=="female" ? 'selected' : ''}}>Female</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="role" class="form-label">Role :
                                        <a class="text-danger">{{$errors->first('role')}}</a>
                                      </label>
                                      <select name="role" id="role" class="form-control">
                                        <option value="" selected readonly>----Select Role----</option>
                                        <option value="admin" {{old('role')=="admin" ? 'selected' : ''}}>Admin</option>
                                        <option value="super_admin" {{old('role')=="super_admin" ? 'selected' : ''}}>Super Admin</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="password" class="form-label">Password :
                                        <a class="text-danger">{{$errors->first('password')}}</a>
                                      </label>
                                      <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="password_confirmation" class="form-label">Confirm Password :
                                        <a class="text-danger">{{$errors->first('password_confirmation')}}</a>
                                      </label>
                                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                              <label for="image" class="form-label">Choose Profile Picture</label>
                              <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <button class="btn btn-success">Register</button>
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