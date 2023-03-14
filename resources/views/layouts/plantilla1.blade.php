<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   {{-- <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ /> --}}    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>
    {{-- favicon --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Bootstrap 5 CSS -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- estilos --}}
        <link href="{{asset('css/cerGeneratorStyle01.css') }}" rel="stylesheet">
</head>
<body>
    {{-- header --}}
    {{-- nav --}}

    @yield('content')

    {{-- footer --}}
    {{-- script --}}

</body>
</html>