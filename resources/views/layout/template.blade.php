<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap
/3.3.4/css/bootstrap.min.css">
    <link ref="stylesheet"  href="{{ URL::asset('css/custom.css') }}" >
</head>
<body>
<div class="container">
    @yield('toolbar')
    @yield('content')
</div>
</body>
</html>