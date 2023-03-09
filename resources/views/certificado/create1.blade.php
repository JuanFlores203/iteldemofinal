@extends('layouts.plantilla1')

@section('title','Ingresar datos a tabla')

@section('content')
    <div class="container">
        <form action="uploaddata" method="POST" enctype="multipart/form-data"> 
            {{-- {{url('uploaddata')}} --}}
            @csrf
            <H1> CREATE </H1>            
                <legend>FORM</legend>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Fecha emisión:</label>
                        <input type="date" id="disabledTextInput" name="fecha_emision" class="form-control" placeholder=" ">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Código de certificado:</label>
                        <input type="text" id="disabledTextInput" name="codigo_certificado" class="form-control" placeholder=" ">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Razón:</label>
                        <input type="text" id="disabledTextInput" name="razon" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Nombre:</label>
                        <input type="text" id="disabledTextInput" name="nombre" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Apellido:</label>
                        <input type="text" id="disabledTextInput" name="apellido" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Código estudiante:</label>
                        <input type="text" id="disabledTextInput" name="codigo_estudiante" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Descripción:</label>
                        <input type="text" id="disabledTextInput" name="descripcion" class="form-control" placeholder="">
                    </div>
                    <div>
                        <input type="file"  name="file" class="form-control-file" placeholder="">
                    </div>
                
                <input type="submit" class="btn btn-success"></button>
            
        </form>
    </div>

@endsection 
