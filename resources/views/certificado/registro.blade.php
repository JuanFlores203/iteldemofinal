@extends('layouts.plantilla3')

@section('title','Ingresar datos a tabla')

@section('content')
    <div class="container">
        <h1>Hola Mundo!</h1><br>
        <a href="{{url('certificado/registrar')}}" class="btn btn-primary">Registrar certificado</a>
        
        <table class="table">
            <thead>
                <th>id</th>
                <th>fecha emision</th>
                <th>certificado_code</th>
                <th>razon</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>estudiante_code</th>
                <th>gen_code</th>
                <th>descripcion</th>
                <th>documento</th>
                <th>view</th> {{-- documento --}}
                <th>herramientas</th>
                <th> </th>
            </thead>
            <tbody>
                @foreach ($certificado_qr as $item)
                <tr>
                    <td>{{ $item->certqr_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->fecha_emision)->format('d-m-Y')}}</td>
                    <td>{{$item->certificado_code}}</td>
                    <td>{{$item->razon}}</td>
                    <td>{{$item->nombre_est}}</td>
                    <td>{{$item->apellido_est}}</td>
                    <td>{{$item->certificado_code}}</td>
                    <td>{{$item->gen_code}}</td>
                    <td>{{$item->descripcion}}</td>
                    <td>{{$item->documento}}</td>
                    <td>👀</td>
                    <td> ✏ | 
                        <form action="{{ url('/delete/'.$item->certqr_id ) }}" method="post">
                            @csrf    
                            {{-- {{ method_field('DELETE')}}                         --}}
                            @method("DELETE")
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')"
                            value="Borrar">
                            
                        </form>1:07:27
                        {{-- <form action="{{ url('certificado/delete/'.$item->certqr_id ) }}" method="post">
                            @csrf    
                            {{ method_field('DELETE')}}                        
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')"
                            value="Borrar">
                            
                        </form> --}}
                    </td>
                </tr>   
                @endforeach
                
            </tbody>
        </table>
            
    </div>
@endsection
