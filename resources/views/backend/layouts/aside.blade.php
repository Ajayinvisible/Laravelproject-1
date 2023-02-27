@section('aside')
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-user-secret"></i><span>Admin List</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.create')}}">
              <i class="fa-solid fa-user-plus"></i><span>Add User</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.index')}}">
              <i class="fa-solid fa-eye"></i><span>Show User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-cat" data-bs-toggle="collapse" href="#">
          <i class="fa-regular fa-folder-open"></i><span>News Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-cat" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.create')}}">
              <i class="fa-solid fa-file-circle-plus"></i><span>Add News Category</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.index')}}">
              <i class="fa-solid fa-file-circle-check"></i><span>Show News Category</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-news" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-newspaper"></i><span>News</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-news" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.create')}}">
              <i class="fa-solid fa-file-circle-plus"></i><span>Add News</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.index')}}">
              <i class="fa-solid fa-file-circle-check"></i><span>Show News</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-banner" data-bs-toggle="collapse" href="#">
          <i class="fa-sharp fa-solid fa-panorama"></i><span>Banner</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-banner" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.create')}}">
              <i class="fa-solid fa-camera"></i><span>Add Banner</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.index')}}">
              <i class="fa-solid fa-photo-film"></i><span>Show Banner</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.show',Auth::guard('admin')->user()->id)}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside>

@endsection