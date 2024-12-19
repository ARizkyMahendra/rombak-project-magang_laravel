<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    {{-- <link href="{{asset('css/style.css')}}" type="" rel="stylesheet"> --}}

    <title>{{$title}}</title>
</head>
<body>
    @if(Auth::check())
    <div class="text-center">
        <h1>Halo ! {{Auth::user()->name}}</h1>
        <a class="btn btn-danger btn-sm" href="logout">Logout</a>
    </div>
    @endif
    <h1>Halaman admin</h1>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>