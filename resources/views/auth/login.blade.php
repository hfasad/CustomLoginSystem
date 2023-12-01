<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Banking App</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bodycolor">

<div class="container loginmargin">
  <div class="row">
      <div class="col-md-4 offset-md-4">
          <div class="card form-holder colorcard">
              <div class="card-body ">
                    <div class="text-center text-white">
                    <h1>Login</h1>
                    </div>
                <form action="{{route('login-user')}}" method="post">
                    @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                    @csrf
                      <div class="form-group margin">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                      </div>
                      <div class="form-group margin">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="col-4 text-right margin">
                      <input type="submit" class="btn btn-dark" value="Login">
                    </div>
                    <br>
                    <a href="registeration">New User !! Register Here</a>
                </form> 
              </div>
          </div>
      </div>
  </div>
</div>
</body>