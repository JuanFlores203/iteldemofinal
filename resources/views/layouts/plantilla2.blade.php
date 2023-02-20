<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   {{-- <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ /> --}}    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>
    {{-- favicon --}}
    {{-- estilos --}}
        <link href="{{asset('css/showStyle01.css') }}" rel="stylesheet">
        
</head>
<body>
    {{-- header --}}
    {{-- nav --}}

    @yield('content')

    {{-- footer --}}
    {{-- script --}}

</body>
</html>