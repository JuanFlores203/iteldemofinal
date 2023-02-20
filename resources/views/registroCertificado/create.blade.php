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
    {{-- showing alert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- estilos --}}
        <link href="{{asset('css/editRegisterStyle01.css') }}" rel="stylesheet">

    <title>Nuevo registro</title>
</head>

<body>
    
    <div class="container">
        <div class="sub-container">
            
            <div class="titles">
                <div class="title"><H3> Nuevo registro </H3></div>

                <div class="sub-title">
                    <a href="{{ url('/certificado/') }}" id="mtd4" class="mtd4" onclick="cambiar4()">
                        <box-icon name='x-circle' border="circle" size="md" color="#D61C4E"></box-icon>
                    </a>
                </div>
            </div>

            <form id="createForm" action="{{url('/certificado')}}" method="POST" enctype="multipart/form-data">         
                @csrf
                    {{-- @include('registroCertificado.form') --}}

                    <div class="razon-details">                        
                        <div class="input-box">
                            <label for="disabledTextInput" class="details">Razón:</label>
                            <input type="text" id="razon"  name="razon" class="form-control" placeholder="" required>
                        </div>
                    </div>

                    <div class="user-details">
                    
                        <div class="input-box">
                            <label for="disabledTextInput" class="details">Fecha emisión:</label>
                            <input type="date" id="fecha_emision"  name="fecha_emision" class="form-control" placeholder=" " required>
                        </div>                                              
                        
                        <div class="input-box">
                            <label for="disabledTextInput" class="details">Código de certificado:</label>
                            <input type="text" id="certificado_code"  name="certificado_code" class="form-control" placeholder=" " required>
                        </div>
                                                
                        <div class="input-box">
                            <label for="disabledTextInput" class="details">Nombre:</label>
                            <input type="text" id="nombre_est"  name="nombre_est" class="form-control" placeholder="Ingrese los nombres" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="disabledTextInput" class="details">Apellido:</label>
                            <input type="text" id="apellido_est"  name="apellido_est" class="form-control" placeholder="Ingrese los apellidos" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="disabledTextInput" class="details">Código estudiante:</label>
                            <input type="text" id="estudiante_code"  name="estudiante_code" class="form-control" placeholder="" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="disabledTextInput" class="details">Descripción:</label>
                            <input type="text" id="descripcion"  name="descripcion" class="form-control" placeholder="" >
                        </div>
                        
                        <div class="input-box2">
                            <label for="disabledTextInput" class="details">Archivo:</label> <br>
                            <input type="file" id="documento"  name="documento" class="form-control-file">
                        </div>
                        
                    </div>

                    <div class="button">
                        <input type="submit" name="btn" class="btn" value="Guardar" id="submit-form-create" style="display: none;">
                        <input onclick="submitTheForm()" value="Guardar">
                    </div>
            </form>

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
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: `Don't save`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                document.getElementById("submit-form-create").click();                    
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    }
</script>
</html>


