<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A Laravel Blade demo application">
    <meta name="author" content="Dmitriy">
    <title>@yield('title', 'My Laravel App')</title>
</head>
<body>

    <header>
        <h1>Laravel Demo</h1>
        <nav><a href="/">Home</a></nav>
    </header>

    <hr>

    <main>
        @yield('content')
    </main>

    <hr>


</body>
</html>
