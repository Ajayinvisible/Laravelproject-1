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
                        <form action="{{route('admin-change-password')}}" method="post">
                            @csrf
                              <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password :
                                  <a class="text-danger">{{$errors->first('old_password')}}</a>
                                </label>
                                <input type="password" name="old_password" id="old_password" class="form-control">
                              </div>
                              <div class="mb-3">
                                <label for="password" class="form-label">Password :
                                  <a class="text-danger">{{$errors->first('password')}}</a>
                                </label>
                                <input type="password" name="password" id="password" class="form-control">
                              </div>
                              <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password :
                                  <a class="text-danger">{{$errors->first('password_confirmation')}}</a>
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
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