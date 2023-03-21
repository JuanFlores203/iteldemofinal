<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">     

    @yield('css')
        
    <!-- Bootstrap 5 CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    
    {{-- favicon --}}
      <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
      
    {{-- estilos --}}
      <link href="{{asset('css/registroStyle01.css') }}" rel="stylesheet">
    
    {{-- DataTable css básico --}}
      {{-- <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"> 
      
      {{-- <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css') }} "/> --}}

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