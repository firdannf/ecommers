<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="\assets\css\sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex justify-content-center align-items-center py-4 bg-body-tertiary bg-log">
    <div class="card" style="" >
      <div class="card-body">
        <div class="container"><br>
          <h2 class="text-center"><b style="font-style: italic">Fashion<span style="color: orangered">G</span></b><br>Fashiong Shop sell all brand</h3>
          <hr>
          @if(session('error'))
          <div class="alert alert-danger"> <b>Opps!</b> {{session('error')}}
          </div>
          @endif
          <form action="{{ route('actionlogin') }}" method="post">
          @csrf
          <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control"
          placeholder="Email" required="">
          </div>
          
          <div class="form-group">
          <label>Password</label>
          
          <input type="password" name="password" class="form-control" 
          placeholder="Password" required="">
          
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block">Log
          In</button>
          <hr>
          <p class="text-center">Belum punya akun? <a
          href="/register">Register</a> sekarang!</p>
          </form>
          </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>