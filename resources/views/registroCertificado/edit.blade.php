<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- favicon --}}
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Bootstrap 5 CSS -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- estilos --}}
        <link href="{{asset('css/editRegisterStyle01.css') }}" rel="stylesheet">
    <title>Editar registro</title>
</head>
<body>
    <div class="container">
        <div class="container-seccion-titulo">
            <br>
            <h4 class="navbar-brand">SUBIR ARCHIVO</h4>          
            <br>  
        </div>

        <div class="container-seccion-menu2">
            <a href="{{ url('/certificado/') }}" id="mtd4" class="mtd4" onclick="cambiar4()">
              <box-icon name='x-circle' border="circle" size="md" color="#D61C4E"></box-icon>
            </a>
        </div>       

        <div class="container-seccion">
            
            <div class="forms">
                

                <form class="form1">
                    @include('registroCertificado.form')
                </form>
                    
                {{-- {{ url('/certificado/'.$RegistroCertificadoQR->certqr_id ) }} --}}
                <form class="form2" action="{{ url('/certificado/'.$data2->tram_id ) }}" method="post" enctype="multipart/form-data" >
                    
                        @csrf    
                        {{ method_field('PATCH') }} 
                        <div class="input-box2">
                            <label for="disabledTextInput" class="details">Archivo:</label> <br>
                            <input type="file" id="detalldoc_Nomarchivo" value="{{ $data2->detalldoc_Nomarchivo }}" name="detalldoc_Nomarchivo" class="form-control-file" >
                        </div> 
                        
                        <div class="button">
                            <input type="submit" class="btn btn-success" value="Guardar" id="submit-form-edit" style="display: none;"">
                            <input onclick="submitTheForm()" class="btn btn-success" value="Guardar">
                        </div>                            

                        
                </form>
            </div>
            <div class="form-image">
                {{-- <iframe class="pdf" src="/Archivos/{{ $RegistroCertificadoQR->documento }}"></iframe>                     nota: cuando el pdf se guarda en la carpeta PUBLIC --}} 
                <iframe class="pdf" src="{{asset('storage').'/Archivos/'.$data2->detalldoc_Nomarchivo }}"></iframe>  {{--nota: cuando el pdf se guarda en la carpeta STORAGE--}}
                
            </div>
            
        </div>
    </div>

</body>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>               {{--    Alert message     --}}

    @if (session('save') == 'ok')
            <script>
                Swal.fire('Saved!', '', 'success')
            </script>
    @endif

    <script>        

        function submitTheForm(){
            Swal.fire({
                title: '¿Quieres guardar los cambios?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                denyButtonText: `No guardar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    document.getElementById("submit-form-edit").click();                    
                } else if (result.isDenied) {
                    Swal.fire('Los cambios no se guardaron', '', 'info')
                }
            })
        }
    </script>                                                                   {{--    END Alert message     --}}

</html>
