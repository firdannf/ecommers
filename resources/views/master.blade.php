<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashiong</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-4 bg-body-tertiary">
        <div class="container" style="background-color: rgb(255, 255, 255)">
            <div class="me-5">
                <a class="navbar-brand" href="/">
                    <img src="">
                    <b class="fs-3">Fashion<span style="color:rgb(255, 64, 0)">G</span></b>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0 " style="font-size: 20px" >
                    @if(Auth::user()->role=='masteradmin')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/user/tampil">User</a>
                    </li>
                    @endif

                    @if(Auth::user()->role=='' or Auth::user()->role=='admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/produk/tampil">Product</a>
                    </li>
                    @endif

                    @if (Auth::user()->role=='customer' or Auth::user()->role=='admin' )
                        
                    <li class="nav-item">
                        <a class="nav-link" href="/pembelian/tampil">Transaksi</a>
                    </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    <li>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-danger" type="submit">Search</button>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b class="text-primary">{{ Auth::user()->email}}</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="p-2 bg-info text-bold">Level: {{ Auth::user()->role}}</li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="p-2"><a href="{{route('actionlogout')}}"><button class="btn btn-outline-danger" type="submit">Log Out</button></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <p class="p-2">@yield('konten')</p>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>