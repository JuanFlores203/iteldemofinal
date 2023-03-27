@extends('layouts.plantilla2')

@section('title','SHOW')

@section('content')
    <div class="container">

        <div class="form">
            <form>
                <div class="form-header">
                    <div class="title"><h1> Datos del Documento Verificado </h1> </div>
                
                    <div class="logoitel">
                        <img src="{{URL::asset('Recursos/logo1.png')}}"  >
                    </div>
                </div>
                
                <div class="input-group">
                    {{-- fieldset --}}
                    @foreach ($data as $item)
                       
                        <div class="input-box">
                            <label for="disabledTextInput" class="form-label">Razón:</label>
                            <div disabled type="text" id="disabledTextInput" class="form-control">{{$item->car_nombre}}</div>
                            {{-- <input  disabled type="text" id="disabledTextInput" class="form-control" placeholder="{{$item->car_nombre}}"> --}}
                        </div>                        
                        
                        <div class="input-box">
                            <label for="disabledTextInput" class="form-label">Nombre:</label>
                            <div disabled type="text" id="disabledTextInput" class="form-control">{{$item->est_nombre}}</div>
                            {{-- <input disabled type="text" id="disabledTextInput" class="form-control" placeholder="{{$item->est_nombre}}"> --}}
                        </div>
                        <div class="input-box">
                            <label for="disabledTextInput" class="form-label">Apellido:</label>
                            <div disabled type="text" id="disabledTextInput" class="form-control">{{$item->est_apellido}}</div>
                            {{-- <input disabled type="text" id="disabledTextInput" class="form-control" placeholder="{{$item->est_apellido}}"> --}}
                        </div>
                        <div class="input-box">
                            <label for="disabledTextInput" class="form-label">Código de certificado:</label>
                            <div disabled type="text" id="disabledTextInput" class="form-control">{{$item->tram_num_expediente}}</div>
                            {{-- <input disabled type="text" id="disabledTextInput" class="form-control" placeholder="{{$item->detalldoc_cod2}}"> --}}
                        </div>
                        <div class="input-box">
                            <label for="disabledTextInput" class="form-label">Fecha emisión:</label>
                            <div disabled type="text" id="disabledTextInput" class="form-control" >{{ \Carbon\Carbon::parse($item->tram_emision)->format('d-m-Y')}}</div>
                            {{-- <input disabled type="text" id="disabledTextInput" class="form-control" placeholder="{{ \Carbon\Carbon::parse($item->tram_update_at)->format('d-m-Y')}}"> --}}
                        </div>
                        
                        <div class="download-button">
                            <button> <a  href="{{url('/download',$item->detalldoc_Nomarchivo)}}"> Descargar </a></button>
                        </div>
                        
                    @endforeach                    
                </div>
            </form>
        </div>

        <div class="form-image">
            @foreach ($data as $item)
                @if ($item->detalldoc_Nomarchivo && Storage::disk('public')->exists('Archivos/' . $item->detalldoc_Nomarchivo))
                    <iframe class="pdf" src="{{ asset('storage').'/Archivos/'.$item->detalldoc_Nomarchivo }}"></iframe>
                @else
                    <p class="alertMs-FileNotFound"> <span>¡Notificación!: </span> Archivo no encontrado</p>
                @endif
            @endforeach
        </div>
        
    </div>
    
    {{-- <div class="container2">
        <ul>
            @foreach ($Certificado_qr as $item)
                <li>{{$item->razon}}</li>                
            @endforeach
        </ul>
    </div> --}}
@endsection 