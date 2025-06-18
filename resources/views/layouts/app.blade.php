<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">🎬 LayarKaca21</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
          </ul>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Watchlist</a>
            </li>
          </ul>
    </nav>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="text-center py-3 bg-light">
        <small>&copy; {{ date('Y') }} LayarKaca21 Copyright by Dimas Aditya Ramadhan</small>
    </footer>
</body>
</html>
