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
                    <h5 class="card-title">Admin User List <i class="fa-solid fa-eye"></i>
                      <a href="{{route('admin.create')}}" class="btn btn-primary float-end"><i class="fa-solid fa-user-plus"></i>&nbsp; Register</a>
                    </h5><hr>
                  </div>
                  <div class="col-md-12">
                    <table class="table table-hover table-striped">
                      <thead class="table-dark">
                       <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                       </tr>
                      </thead>
                      <tbody>
                        @if($adminData->count()>0)
                          @foreach ($adminData as $key=>$admin) 
                            <tr>
                              <td>{{++$key}}</td>
                              <td>{{$admin->name}}</td>
                              <td>{{$admin->username}}</td>
                              <td>{{$admin->email}}</td>
                              <td>{{$admin->gender}}</td>
                              <td>{{$admin->role}}</td>
                              <td>
                                @if ($admin->is_active==1)
                                  <span class="badge bg-success"><i class="fa-solid fa-circle-check"></i></span>
                                @else
                                  <span class="badge bg-warning"><i class="fa-solid fa-circle-xmark"></i></span>
                                @endif
                              </td>
                              <td>
                                @if($admin->gallery)
                                  <img src="{{url($admin->gallery->image)}}" class="rounded-circle" style="width: 40px; height:40px; border-radious:50%;" alt="">
                                @endif
                              </td>
                              <td>
                                <form action="{{route('admin.destroy',$admin->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <a href="{{route('admin.show',$admin->id)}}" class="btn btn-secondary" title="Show"><i class="fa-solid fa-eye"></i></a>
                                  @can('admin')
                                  <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-primary" title="Update"><i class="fa-solid fa-pen-to-square"></i></a>
                                  <button class="btn btn-danger" title="Delete"><i class="fa-solid fa-trash-can"></i></button>
                                  @endcan
                                </form>
                              </td>
                            </tr>
                          @endforeach
                          @else
                          <tr>
                            <td colspan="9" class="text-center">No Data Found</td>
                          </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-12">
                    {{$adminData->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </main>
@endsection