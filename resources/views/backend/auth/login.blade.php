<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{url('backend-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-4 mt-5">
                <h1>Login to Dashboard</h1><hr>
                @include('helper.message')
            </div>
            <div class="col-lg-4 offset-4">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="username" class="form-label">Username : 
                        <a class="text-danger text-decoration-none">{{$errors->first('username')}}</a>
                      </label>
                      <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password : 
                        <a class="text-danger text-decoration-none">{{$errors->first('password')}}</a>
                      </label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{url('backend-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>