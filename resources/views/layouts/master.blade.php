<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device.width, initial-scale=1">
    <title>WeFashion</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/template.css')}}" rel="stylesheet">
</head>

<body>
    <nav>
        @include('partials.menu')
    </nav>
    <div class="content">
        <div>
            @yield('content')
        </div>
    </div>
    <footer>
        @include('partials.footer')
    </footer>
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @show
</body>

</html>