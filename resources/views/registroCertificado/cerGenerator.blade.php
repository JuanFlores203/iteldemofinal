@extends('layouts.plantilla1')

@section('title','Generar certificado')

@section('content')
  <div class="container">

      <div class="container-seccion-titulo">
        <h4 class="navbar-brand">Generador de certificado</h4>
      </div>

      <div class="container-seccion-menu2">

        <a href="{{ url('/certificado/') }}" id="mtd4" class="mtd4" onclick="cambiar4()">
          <box-icon name='x-circle' border="circle" size="md" color="#D61C4E"></box-icon>
        </a>
      </div>

      <div class="container-seccion" >


          <div class="container-table" role="grid" aria-describedby="dataTable_info" style="overflow-x: auto;">
            <table class="table-my-0" id="myTable">
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

                      </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
      </div>

      <div class="container-cards">

            <div class="card">
                {{-- <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                  <h4 class="card-title">Diploma modular</h4>
                  <p class="card-text">Diploma por carrera </p>
                  <a href="{{url('/test/'. $id . '/1')}}" class="boton-card">Descargar</a>
                </div>
            </div>


            <div class="card">
              {{-- <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="..."> --}}
              <div class="card-body">
                <h4 class="card-title">Asistencia y Aprobación </h4>
                <p class="card-text">Curso libre - curso especial </p>
                <a href="{{url('/test/'. $id . '/2')}}" class="boton-card">Descargar</a>
              </div>
          </div>

          <div class="card">
            {{-- <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="..."> --}}
            <div class="card-body">
              <h4 class="card-title">Certificado-Bachillerato</h4>
              <p class="card-text">Modular </p>
              <a href="{{url('/test/'. $id . '/3')}}" class="boton-card">Descargar</a>
            </div>
          </div>

          <div class="card">
            {{-- <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="..."> --}}
            <div class="card-body">
              <h4 class="card-title">Certificado por Creditaje</h4>
              <p class="card-text">Ciencias de la Salud </p>
              <a href="{{url('/test/'. $id . '/4')}}" class="boton-card">Descargar</a>
            </div>
          </div>

          <div class="card">
            {{-- <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="..."> --}}
            <div class="card-body">
              <h4 class="card-title">Certificado-Alimentarias</h4>
              <p class="card-text">Certificado Bachillerato para Alimentarias  </p>
              <a href="{{url('/test/'. $id . '/5')}}" class="boton-card">Descargar</a>
            </div>
          </div>

          <div class="card">
            {{-- <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="..."> --}}
            <div class="card-body">
              <h4 class="card-title">Certificado por Curso</h4>
              <p class="card-text">Certificado por curso y por carrera </p>
              <a href="{{url('/test/'. $id . '/6')}}" class="boton-card">Descargar</a>
            </div>
          </div>

          <div class="card">
            {{-- <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="..."> --}}
            <div class="card-body">
              <h4 class="card-title">Certificado Mecánica</h4>
              <p class="card-text">Computación básica </p>
              <a href="{{url('/test/'. $id . '/7')}}" class="boton-card">Descargar</a>
            </div>
          </div>
          
      </div>
  </div>




@endsection
