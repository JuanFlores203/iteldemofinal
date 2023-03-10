@extends('layouts.plantilla3')

@section('css')
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"> --}}
    {{-- showing alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@endsection




@section('title','Ingresar datos a tabla')

@section('content')
    <div class="container">
        <h1>Registro de certificados</h1><br>

        <div class="row">              {{-- Crear nuevo registro --}}
            {{-- <div class="col">
                <a href="{{url('certificado/create')}}" class="btn btn-primary">Registrar certificado</a>
            </div> --}}

            <div class="col">          {{-- Vista del Qr generado y boton de descarga --}}
                <img alt="Código QR" id="qrimagen" src="{{URL::asset('Recursos/qrCodeITEL.png')}}" style="width: 100px; height: 100px;">
                <button id="btn" type="button" class="btn btn-success">Descargar</button>
            </div>
            <div>
                <br>
            </div>
        </div>

        <table class="table table-striped" style="width:100%" id="myTable" >
            <thead class="table-dark">
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Fecha de emisión(update)</th>                      
                    <th scope="col" >Código de certificado</th>
                    <th scope="col" >Razón</th>
                    <th scope="col" >Nombre</th>
                    <th scope="col" >Apellido</th>
                    <th scope="col" >Código estudiante</th>
                    <th scope="col" >Código generado</th>
                    <th scope="col" >Descripción</th>
                    <th scope="col" >Nombre del archivo</th>
                    <th scope="col" >Estado</th>
                    <th scope="col" >Generar QR</th> {{-- documento --}}
                    <th scope="col" >Subir archivo</th>
                    <th scope="col" >Borrar </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tram_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tram_updated_at)->format('d-m-Y')}}</td>
                    <td>{{$item->detalldoc_cod2}}</td>
                    <td>{{$item->car_nombre}}</td>
                    <td>{{$item->est_nombre}}</td>
                    <td>{{$item->est_apellido}}</td>
                    <td>{{$item->est_cod2}}</td>
                    <td>{{$item->detalldoc_codgen}}</td>
                    <td>{{$item->tram_obervacion}}</td>
                    <td style="color: {{ $item->detalldoc_Nomarchivo ? 'green' : 'orange' }}"><b>
                        {{ $item->detalldoc_Nomarchivo ?: 'N/A' }}</b>
                    </td>
                    {{-- <td style="background-color: {{ $item->detalldoc_Nomarchivo ? '#54B435' : 'orange' }}"><b>{{$item->detalldoc_Nomarchivo}}</b></td> --}}
                    <td>{{$item->tram_estado}}</td>

                    <td> {{-- Generar qr --}}
                        <a href="#" id="mtd4" class="mtd4" onclick="cambiar4()">
                            <box-icon name='qr' border="circle" size="md" color="#31C6D4"></box-icon>               {{-- <img src="{{URL::asset('Recursos/iconQRgenerator2.png')}}"  style="width: 50%"> --}}                            
                        </a>
                        
                    </td>

                    <td>    {{-- Editar --}}                        
                        <a href="{{ url('/certificado/'.$item->tram_id.'/edit') }}">
                            <box-icon name='edit' border="circle" size="md" ></box-icon>             {{-- <img src="{{URL::asset('Recursos/iconEdit.png')}}"  style="width: 50%"> --}}
                        </a>
                        
                    </td>

                    <td>    {{-- Delete --}}
                        <form action="{{ url('/certificado/'.$item->tram_id ) }}" method="post">
                            @csrf    
                            {{ method_field('DELETE')}}
                            {{-- @method("DELETE") --}}
                            
                            <button type="submit" onclick="return confirm('¿ Estas seguro de eliminar este registro ?')" style="border: 0; Background-color: transparent;" ><box-icon name='message-alt-x' border="circle" size="md" color="#D61C4E"></box-icon ></button>
                        </form>    
                            {{--<input type="submit" id="submit-form" value="Submit Form" style="display: none;"/>--}}
                            {{--<button onclick="submitTheForm()" class="" {{--onclick="return confirm('¿Quieres borrar?')"--}}    {{--style="border: 0; Background-color: transparent;">   
                                    {{--<box-icon name='message-alt-x' border="circle" size="md" color="#D61C4E"></box-icon>
                            </button>--}}                                                
                    </td>

                </tr>   
                @endforeach
                
            </tbody>
            <tfoot></tfoot>
        </table>
            
    </div>
    <script src="{{asset('js/alertMesage.js') }}"></script>

    {{-- js for qr creator --}}
        <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>
        <script>
            const $imagen = document.querySelector("#qrimagen"),
                $boton = document.querySelector("#btn");

                function cambiar4(){            
                    $('a.mtd4').click(function(){                
                        var gen_code = $(this).parents("tr").find("td").eq(7).html();
                        //document.getElementById('box').innerHTML = '';
                        
                        new QRious({
                            element: $imagen,
                            value: "http://localhost:8000/certificado/validacion/"+gen_code, // La URL o el texto
                            size: 400,
                            backgroundAlpha: 0, // 0 para fondo transparente
                            foreground: "black", // Color del QR
                            level: "Q", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
                        });

                        $boton.onclick = () => {
                            const enlace = document.createElement("a");
                            enlace.href = $imagen.src;
                            enlace.download = gen_code+"QRcode.png";
                            enlace.click();
                        }

                    });               
                };

            
        </script>


    @section('js-dataTable')
        
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable({
                    scrollX: true,
                });
            } );
        </script>
        
    @endsection

    @section('js-sweeAlert')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('eliminar') == 'ok')
            <script>
                Swal.fire(
                'Eliminado!',
                'Tu registro a sido eliminado.',
                'success'
                )
            </script>
        @endif

        <script>
            function submitTheForm(){
                //event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {       
                        alert("hola")            
                        return true
                        //document.getElementById("submit-form").click();
                    }
                }) 
            }

        </script>
    @endsection

@endsection
