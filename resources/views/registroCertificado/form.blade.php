@foreach ($data as $item)

<div class="razon-detailsJJ">
    <div class="input-boxJJ">
        <label for="disabledTextInput" class="details">Razón:</label>
        <input disabled type="text" id="razon" value="{{ $item->car_nombre }}" name="razon" class="form-control" placeholder="" required>
    </div>
</div>

<div class="user-detailsJJ">

    <div class="input-boxJJ">
        <label for="disabledTextInput" class="details">Fecha emisión:</label>
        <input disabled type="date" id="fecha_emision" value="{{ \Carbon\Carbon::parse($item->tram_emision)->format('Y-m-d') }}" name="fecha_emision" class="form-control" placeholder=" " required>
    </div>                                              

    <div class="input-boxJJ">
        <label for="disabledTextInput" class="details">Código de certificado:</label>
        <input disabled type="text" id="certificado_code" value="{{ $item->tram_num_expediente}}" name="certificado_code" class="form-control" placeholder=" " required>
    </div>

    <div class="input-boxJJ">
        <label for="disabledTextInput" class="details">Nombre:</label>
        <input disabled type="text" id="nombre_est" value="{{ $item->est_nombre }}" name="nombre_est" class="form-control" placeholder="" required>
    </div>

    <div class="input-boxJJ">
        <label for="disabledTextInput" class="details">Apellido:</label>
        <input disabled type="text" id="apellido_est" value="{{ $item->est_apellido }}" name="apellido_est" class="form-control" placeholder="" required>
    </div>

    <div class="input-boxJJ">
        <label for="disabledTextInput" class="details">Código estudiante:</label>
        <input disabled type="text" id="estudiante_code" value="{{$item->est_cod2}}" name="estudiante_code" class="form-control" placeholder="" required>
    </div>

    <div class="input-boxJJ">
        <label for="disabledTextInput" class="details">Descripción:</label>
        <input disabled type="text" id="descripcion" value="{{ $item->tram_observacion }}" name="descripcion" class="form-control" placeholder="">
    </div>

    {{-- <div class="input-box2">
        <label for="disabledTextInput" class="details">Archivo:</label> <br>
        <input type="file" id="documento" value="{{ $item->detalldoc_Nomarchivo }}" name="documento" class="form-control-file" >
    </div> --}}

</div>


{{-- ----------------- --}}
@endforeach
{{-- <div class="input-box2">
    <label for="disabledTextInput" class="details">Archivo:</label> <br>
    <input type="file" id="documento" value="{{ $data2->detalldoc_Nomarchivo }}" name="documento" class="form-control-file" >
</div> --}}






{{-- este es el original.----------------------------------------------------------------------- --}}
{{-- <div class="razon-details">
    <div class="input-box">
        <label for="disabledTextInput" class="details">Razón:</label>
        <input type="text" id="razon" value="{{ $data->car_nombre }}" name="razon" class="form-control" placeholder="" required>
    </div>
</div> --}}

{{-- <div class="user-details">

    <div class="input-box">
        <label for="disabledTextInput" class="details">Fecha emisión:</label>
        <input type="date" id="fecha_emision" value="{{ \Carbon\Carbon::parse($data->tram_updated_at)->format('Y-m-d') }}" name="fecha_emision" class="form-control" placeholder=" " required>
    </div>                                              

    <div class="input-box">
        <label for="disabledTextInput" class="details">Código de certificado:</label>
        <input type="text" id="certificado_code" value="{{ $data->detalldoc_cod2 }}" name="certificado_code" class="form-control" placeholder=" " required>
    </div>

    <div class="input-box">
        <label for="disabledTextInput" class="details">Nombre:</label>
        <input type="text" id="nombre_est" value="{{ $data->est_nombre }}" name="nombre_est" class="form-control" placeholder="" required>
    </div>

    <div class="input-box">
        <label for="disabledTextInput" class="details">Apellido:</label>
        <input type="text" id="apellido_est" value="{{ $data->est_apellido }}" name="apellido_est" class="form-control" placeholder="" required>
    </div>

    <div class="input-box">
        <label for="disabledTextInput" class="details">Código estudiante:</label>
        <input type="text" id="estudiante_code" value="falta codigo estudiante" name="estudiante_code" class="form-control" placeholder="" required>
    </div>

    <div class="input-box">
        <label for="disabledTextInput" class="details">Descripción:</label>
        <input type="text" id="descripcion" value="{{ $data->tram_obervacion }}" name="descripcion" class="form-control" placeholder="">
    </div>

    <div class="input-box2">
        <label for="disabledTextInput" class="details">Archivo:</label> <br>
        <input type="file" id="documento" value="{{ $data->detalldoc_Nomarchivo }}" name="documento" class="form-control-file" >
    </div>

</div>

<div class="button">
    <input type="submit" class="btn btn-success" value="Guardar" id="submit-form-edit" style="display: none;"">
    <input onclick="submitTheForm()" class="btn btn-success" value="Guardar">
</div> --}}

