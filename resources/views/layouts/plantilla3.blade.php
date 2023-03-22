<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">     

    @yield('css')
        
    <!-- Bootstrap 5 CSS -->
      {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    
    {{-- favicon --}}
      <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
      
    {{-- estilos --}}
      <link href="{{asset('css/registroStyle01.css') }}" rel="stylesheet">

    {{-- showing alert --}}
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('title')</title>
  </head>

  <body>

    {{-- header --}}
    {{-- nav --}}

    @yield('content')
    
    
    {{-- footer --}}
    {{-- script --}}
      @yield('js-sweeAlert')        
    {{-- datatables JS --}}    
      @yield('js-dataTable')  
    
  </body>
  <footer>
    <br>
  </footer>
</html>