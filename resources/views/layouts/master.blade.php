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
    <div>
        <div style="display: flex; background-color: gray; color: white; padding: 20px 40px; align-items: center">
            @include('partials.menu')
        </div>
        <div style="padding: 20px 60px">
            <div>
                @yield('content')
            </div>
        </div>
    </div>
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @show
</body>

</html>