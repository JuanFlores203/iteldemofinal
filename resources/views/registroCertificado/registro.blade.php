@extends('layouts.plantilla3')

@section('title','Registro')
@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    
    {{-- <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
@endsection

@section('content')
    <div class="container">
        <div class="container-seccion-titulo">
            <br>
            <h4 class="navbar-brand">REGISTRO DE CERTIFICADOS</h4>          
            <br>  
        </div>

        <div class="container-qr">
            <div class="card-qr">
                {{-- <div > <a href="{{url('certificado/create')}}" class="btn btn-primary">Registrar certificado</a> --}}
                    <img alt="Código QR" id="qrimagen" src="{{URL::asset('Recursos/qrCodeITEL.png')}}"> {{-- style="width: 200px; height: 200px; --}}
                    <button id="btn" type="button" class="boton-download-qr">Descargar</button>                
            </div>    

        </div>

        <div class="container-seccion">
            <div class="container-table">
                <table class="table  table-my-0" id="myTable" >
                    <thead class="thead">
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
                            <th scope="col" >Certificado </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
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
                                    
                                    <button class="btn-Eliminar" type="submit" onclick="return confirm('¿ Estas seguro de eliminar este registro ?')"  ><box-icon name='message-alt-x' border="circle" size="md" color="#D61C4E"></box-icon ></button>
                                </form>    
                                    {{--<input type="submit" id="submit-form" value="Submit Form" style="display: none;"/>--}}
                                    {{--<button onclick="submitTheForm()" class="" {{--onclick="return confirm('¿Quieres borrar?')"--}}    {{--style="border: 0; Background-color: transparent;">   
                                            {{--<box-icon name='message-alt-x' border="circle" size="md" color="#D61C4E"></box-icon>
                                    </button>--}}                                                
                            </td>
        
                            <td>
                                <a href="{{ url('/certificado/'.$item->tram_id.'/cerGenerator') }}">
                                    <box-icon name='file-blank' rotate='90' border="circle" size="md" ></box-icon>             {{-- <img src="{{URL::asset('Recursos/iconEdit.png')}}"  style="width: 50%"> --}}
                                </a>
                            </td>
        
                        </tr>
                        @empty
                            <tr>
                                <td colspan="15">No hay registros.</td>
                            </tr>   
                        @endforelse
                        
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>


            
    </div>


    

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
        
        {{-- 1era forma de datatables, sin boostrap, es mas simple --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>        
        
        <script>
            $(document).ready(function () {
                $('#myTable').DataTable({"lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ]});
            });
        </script>

        {{-- 2da forma de datatables, pero esta usa boostrap 5 --}} 
        {{-- 
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#myTable').DataTable({"lengthMenu": [ [1, 10, 50, -1], [1, 10, 50, "All"] ]});
            });
        </script> 
        --}}
    
    @endsection
    
    <script src="{{asset('js/alertMesage.js') }}"></script>
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

        <script> //por alguna razón para eliminar no funciona la alerta con esilo
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
