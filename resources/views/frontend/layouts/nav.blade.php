@section('nav')
    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="{{url('/')}}" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="{{url('/categories')}}" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Politics</a>
                            <a href="#" class="dropdown-item">Business</a>
                            <a href="#" class="dropdown-item">Corporate</a>
                            <a href="#" class="dropdown-item">Sports</a>
                            <a href="#" class="dropdown-item">Health</a>
                            <a href="#" class="dropdown-item">Education</a>
                            <a href="#" class="dropdown-item">Science</a>
                            <a href="#" class="dropdown-item">Technology</a>
                            <a href="#" class="dropdown-item">Foods</a>
                            <a href="#" class="dropdown-item">Entertainment</a>
                            <a href="#" class="dropdown-item">Travel</a>
                            <a href="#" class="dropdown-item">Lifestyle</a>
                        </div>
                    </div>
                    <a href="{{url('/news')}}" class="nav-item nav-link">Single News</a>
                    <a href="{{url('/contact')}}" class="nav-item nav-link">Contact</a>
                </div>
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
@endsection