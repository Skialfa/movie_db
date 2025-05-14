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
    </nav>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="text-center py-3 bg-light">
        <small>&copy; {{ date('Y') }} LayarKaca21 Copyright by Dimas Aditya Ramadhan</small>
    </footer>
</body>
</html>
