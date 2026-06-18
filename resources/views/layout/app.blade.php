<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog Roger</title>

    <link rel="icon" href="{{asset('favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

</head>

<body>

@include('complementos.navbar')


@yield('content')



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('js/scripts.js')}}"></script>

</body>

</html>