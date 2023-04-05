@extends('layouts.plantilla1')

@section('title','Generar certificado')

@section('content')
  <div class="container">

      <div class="container-seccion-tituloJJ">
        <h4 class="navbar-brandJJ">Generador de certificado</h4>
      </div>

      <div class="container-seccion-menu2JJ">

        <a href="{{ url('/certificado/') }}" id="mtd4" class="mtd4" onclick="cambiar4()">
          <box-icon name='x-circle' border="circle" size="md" color="#D61C4E"></box-icon>
        </a>
      </div>

      <div class="container-seccionJJ" >


          <div class="container-tableJJ" role="grid" aria-describedby="dataTable_info" style="overflow-x: auto;">
            <table class="table-my-0JJ" id="myTable">
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
                          <td>{{ \Carbon\Carbon::parse($item->tram_emision)->format('d-m-Y')}}</td>
                          <td>{{$item->tram_num_expediente}}</td>
                          <td>{{$item->car_nombre}}</td>
                          <td>{{$item->est_nombre}}</td>
                          <td>{{$item->est_apellido}}</td>
                          <td>{{$item->est_cod2}}</td>
                          <td>{{$item->detalldoc_codgen}}</td>
                          <td>{{$item->tram_observacion}}</td>
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
                 
            <div class="cards">
              <h2>Certificados Co-Curriculares</h2>              
                  <div class="card-body">
                    <h4 class="card-title">CO-CURRICULAR C.S. DE LA SALUD</h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/1')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">CO-CURRICULAR E.P. ALIMENTARIAS</h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/2')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">CO-CURRICULAR E.P. DERECHO</h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/3')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">CO-CURRICULAR E.P. ING. AMBIENTAL </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/4')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">CO-CURRICULAR E.P. MECÁNICA </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/5')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">CO-CURRICULAR FLCJ </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/6')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

            </div>      

            <div class="cards">
              <h2>Diplomas por Carrera</h2>              
                  <div class="card-body">
                    <h4 class="card-title">AIIA I TÉCNICO CADISTA </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/11')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">AIIA II TÉCNICO EN INGENIERÍA Y ARQUITECTURA </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/12')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">SAEJ I SECRETARIA RECEPCIONISTA </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/13')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">SAEJ II SECRETARIA ADMINISTRATIVA </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/14')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">SAEJ III ASISTENTE EJECUTIVA </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/15')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">TCC I LUYO AUXILIAR CONTABLE </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/16')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">TCC II ASISTENTE CONTABLE & FINANCIERO </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/17')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">TCEI I TÉCNICO EN PROGRAMACIÓN Y BASE DE DATOS </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/18')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">TCEI II TÉCNICO EN PROGRAMACIÓN WEB </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/19')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">TDG I AUXILIAR EN DISEÑO GRÁFICO VECTORIAL </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/20')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>

                  <div class="card-body">
                    <h4 class="card-title">TDG II EXPERTO EN EDICIÓN Y MONTAJE DIGITAL </h4>
                    {{-- <p class="card-text">Diploma por carrera </p><br> --}}
                    <a href="{{url('/test/'. $id . '/21')}}" class="boton-card"><box-icon name='download' color='#FFFFFF'  ></box-icon></a>
                  </div>
            </div> 

      </div>
  </div>




@endsection
