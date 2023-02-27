@extends('backend.master.master')
@section('content')
  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          @include('helper.message')
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Admin User Details
                  <a href="{{route('admin.index')}}" class="btn btn-primary float-end"><i class="fa-solid fa-eye"></i> &nbsp;Show Admins</a>
                </h5>
                <div class="row">
                  <div class="col-lg-6 bg-dark text-white">
                    <h1 class="card-title text-white border-3 border-bottom">Details</h1>
                    <div class="row">
                      <div class="col-md-4">
                        <h4>Name : </h4>
                        <h4>Username : </h4>
                        <h4>Email : </h4>
                        <h4>Gender : </h4>
                        <h4>Role : </h4>
                        <h4>Status :</h4>
                        <h4>Created At</h4>
                      </div>
                      <div class="col-md-8">
                        <h4>{{$adminData->name}}</h4>
                        <h4>{{$adminData->username}}</h4>
                        <h4>{{$adminData->email}}</h4>
                        <h4>{{$adminData->gender}}</h4>
                        <h4>{{$adminData->role}}</h4>
                        <h4>
                          @if ($adminData->is_active==1)
                          <span class="badge bg-success"><i class="fa-solid fa-circle-check"></i></span>
                          @else
                          <span class="badge bg-warning"><i class="fa-solid fa-circle-xmark"></i></span>
                          @endif
                        </h4>
                        <h4>{{$adminData->created_at->diffForHumans()}}</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 bg-dark">
                    <h1 class="card-title text-white border-3 border-bottom">Gallery</h1>
                    <div class="row">
                      @if ($adminData->allImage->count()>0)
                        @foreach ($adminData->allImage as $gallery)
                          <div class="col-md-3 mb-4">
                            <img src="{{url($gallery->image)}}" width="100%" alt="">
                          </div>
                          @endforeach  
                        @else
                          <h4 class="text-danger">No Image Found</h4>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </main>
@endsection