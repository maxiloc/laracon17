<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
<head>
    <title>Laracon Search Demo</title>
</head>
<body>
    <header>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Speakers</a></li>
                <li><a href="/speaker/add">Add Speakers</a></li>
            </ul>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font.css">
</body>
</html>