<?php

namespace App\Http\Controllers;

use App\Models\RegistroCertificadoQR;
use App\Models\DemoRegistroCertificadoQR;
use App\Models\democerQR;

//para el mes en español
use \IntlDateFormatter;
use DateTime;

use clsTinyButStrong;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistroCertificadoQRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DemoRegistroCertificadoQR::join('detalle_documento', 'detalle_documento.detalldoc_id', '=', 'tramite.detalldoc_id')
            ->join('carrera', 'carrera.car_cod', '=', 'tramite.car_cod')
            ->join('estudiante', 'estudiante.est_cod', '=', 'tramite.est_cod')
            ->where('tramite.tram_estado', '=', 'culminado')
            ->get([
                'tramite.tram_id',
                'tramite.tram_estado',
                'tramite.tram_obervacion',
                'tramite.tram_updated_at',
                'tramite.detalldoc_Nomarchivo',
                'tramite.detalldoc_codgen',
                'carrera.car_nombre',
                'estudiante.est_nombre',
                'estudiante.est_apellido',
                'estudiante.est_cod2',
                'detalle_documento.detalldoc_cod2'
            ]);
        // dd($data);
        return view('registroCertificado.registro', compact('data'));




        /*return view('registroCertificado.registro',$dataregistro);*/
        /*return view('registroCertificado.registro', compact('data'));*/


        /*
        $datos['tramite']=DemoRegistroCertificadoQR::paginate(20);
        return view('registroCertificado.registro',$datos);
        */
    }

















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()                        // Esta función no se esta usando, dado que se quito la funcionalidad en la vista
    {
        return view('registroCertificado.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)         // Esta función no se esta usando también, dado que depende de la función anterior
    {
        $data = new RegistroCertificadoQR;

        $file = $request->documento;
        if (empty($file)) {
            $data->documento = "";
            //$data->documento=$request->documento->storeAs('Archivos',$filename);      // PARA GUARDAR EN STORAGE
        } else {
            $file = $request->documento;
            $filename = $file->getClientOriginalName();
            // $request->file->move(public_path().'/Archivos/',$filename);          //PARA GUARDAR EN PUBLIC
            //$data->documento=$filename;
            $request->documento->storeAs('public/Archivos', $filename);              // PARA GUARDAR EN STORAGE y solo con nombre de archivo en BD
            $data->documento = $filename;
            //$data->documento=$request->documento->storeAs('Archivos',$filename);      // PARA GUARDAR EN STORAGE
        }



        $data->fecha_emision = $request->fecha_emision;
        $data->certificado_code = $request->certificado_code;
        $data->razon = $request->razon;
        $data->nombre_est = $request->nombre_est;
        $data->apellido_est = $request->apellido_est;
        $data->estudiante_code = $request->estudiante_code;
        $data->descripcion = $request->descripcion;

        $data->save();
        return redirect()->back()->with('save', 'ok');

        /////////////////////////////////////////////////// if ($request->hasFile('Foto')){} esta linea x si quiero una validación de archivo


        //$datosCertificado = request()->all();
        //$datosCertificado = request()->except('_token');
        //RegistroCertificadoQR::insert($datosCertificado) ;

        //return response()->json($datosCertificado);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroCertificadoQR  $registroCertificadoQR
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroCertificadoQR $registroCertificadoQR)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroCertificadoQR  $registroCertificadoQR
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   //esta funcion permite subir subir el archivo pdf y editar si lo quiere resubir, además de mostrar algunos otros datos
    {
        $data = DemoRegistroCertificadoQR::join('detalle_documento', 'detalle_documento.detalldoc_id', '=', 'tramite.detalldoc_id')
            ->join('carrera', 'carrera.car_cod', '=', 'tramite.car_cod')
            ->join('estudiante', 'estudiante.est_cod', '=', 'tramite.est_cod')
            ->where('tramite.tram_id', '=', $id)
            ->get([
                'tramite.tram_id',
                'tramite.est_cod',
                'tramite.tram_estado',
                'tramite.tram_obervacion',
                'tramite.tram_updated_at',
                'tramite.detalldoc_Nomarchivo',
                'tramite.detalldoc_codgen',
                'carrera.car_nombre',
                'estudiante.est_nombre',
                'estudiante.est_apellido',
                'estudiante.est_cod2',
                'detalle_documento.detalldoc_cod2'
            ]);
        //echo($RegistroCertificadoQR);
        $data2 = DemoRegistroCertificadoQR::findOrFail($id);
        return view('registroCertificado.edit', compact('data2', 'data'));

        //$data = DemoRegistroCertificadoQR::findOrFail($id);

        //return view('registroCertificado.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroCertificadoQR  $registroCertificadoQR
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)       // Esta función de pende de la anterior
    {
        $datos = request()->except(['tram_updated_at', '_token', '_method']);
        // $code= $id.substr($request->est_nombre, 0, 2).substr($request->apellido_est, 0, 2);

        $data = DemoRegistroCertificadoQR::findOrFail($id);
        //$code= $id.$data->est_cod;

        if (!empty($request->detalldoc_Nomarchivo)) {
            $file = $request->detalldoc_Nomarchivo;
            $filename = $file->getClientOriginalName();
            // // $request->file->move(public_path().'/Archivos/',$filename);
            // //$data->documento=$filename;
            // $data->documento=$request->documento->storeAs('Archivos',$filename);
            $oldFile = $data->detalldoc_Nomarchivo;
            Storage::delete('public/Archivos/' . $oldFile);
            $request->file('detalldoc_Nomarchivo')->storeAs('public/Archivos', $filename);
            $datos['detalldoc_Nomarchivo'] = $filename;
        } else {
            return redirect("certificado/$id/edit");
        }

        DemoRegistroCertificadoQR::where('tram_id', $id)->update($datos);
        //
        //$data2 = DemoRegistroCertificadoQR::findOrFail($id);
        //return view('registroCertificado.edit', compact('RegistroCertificadoQR')); nota: esta es la version cvr
        return redirect("certificado/$id/edit")->with('save', 'ok');                     //nota: esta para el alert de confirmación
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroCertificadoQR  $registroCertificadoQR
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    //esta función elimina un registro
    {
        DemoRegistroCertificadoQR::destroy($id);
        //echo($id);
        return redirect('certificado')->with('eliminar', 'ok');
    }

    public function cerGenerator($id)   // esta lo podemos borrar, no afecta en nada
    {
        $data = DemoRegistroCertificadoQR::join('detalle_documento', 'detalle_documento.detalldoc_id', '=', 'tramite.detalldoc_id')
            ->join('carrera', 'carrera.car_cod', '=', 'tramite.car_cod')
            ->join('estudiante', 'estudiante.est_cod', '=', 'tramite.est_cod')
            ->where('tramite.tram_id', '=', $id)
            ->get([
                'tramite.tram_id',
                'tramite.est_cod',
                'tramite.tram_estado',
                'tramite.tram_obervacion',
                'tramite.tram_updated_at',
                'tramite.detalldoc_Nomarchivo',
                'tramite.detalldoc_codgen',
                'carrera.car_nombre',
                'estudiante.est_nombre',
                'estudiante.est_apellido',
                'estudiante.est_cod2',
                'detalle_documento.detalldoc_cod2'
            ]);
        //echo($RegistroCertificadoQR);
        $data2 = DemoRegistroCertificadoQR::findOrFail($id);
        return view('registroCertificado.cerGenerator', compact('data2', 'data', 'id'));

        //$data = DemoRegistroCertificadoQR::findOrFail($id);

        //return view('registroCertificado.edit', compact('data'));
    }

    public function generatordocx($id, $card)
    {
        $code = democerQR::query()->where('tram_id', $id)->first()->detalldoc_codgen;
        $data = DemoRegistroCertificadoQR::join('detalle_documento', 'detalle_documento.detalldoc_id', '=', 'tramite.detalldoc_id')
                                            ->join('carrera', 'carrera.car_cod', '=', 'tramite.car_cod')
                                            ->join('estudiante', 'estudiante.est_cod', '=', 'tramite.est_cod')
                                            ->where('tramite.tram_id', '=', $id)
                                            ->get([
                                                'tramite.tram_id',
                                                'tramite.est_cod',
                                                'tramite.tram_estado',
                                                'tramite.tram_obervacion',
                                                'tramite.tram_updated_at',
                                                'tramite.detalldoc_Nomarchivo',
                                                'tramite.detalldoc_codgen',
                                                'carrera.car_nombre',
                                                'estudiante.est_nombre',
                                                'estudiante.est_apellido',
                                                'estudiante.est_cod2',
                                                'detalle_documento.detalldoc_cod2'
                                            ]);
        //Los parametro que ingresare mas adelante en el certificado en MSword
            $estNombre   = $data[0]->est_nombre;
            $estApellido = $data[0]->est_apellido;
            $carNombre   = $data[0]->car_nombre;                                            
            $numRegistro = $data[0]->detalldoc_cod2;

        // Para obtener el mes actual en texto y español
            $dateFormatter = new IntlDateFormatter('es_ES', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');
            $mes_actual = $dateFormatter->format(new DateTime());
        
        // Para generar el QR eh insertarlo mas adelante en el MSword
        $with = 110;

        $image =
                QrCode::format('png')
                ->size($with)
                ->margin(1)
                ->generate('http://localhost:8000/certificado/validacion/' . $code);

        $output_file = time() . '.png';
        //019720317209.png

        Storage::disk('public')->put($output_file, $image);

        $path = Storage::path('public/' . $output_file);
        // C:\Users\victo\Documents\projects\iteldemofinal\storage\app\public\

        switch ($card) {
            case 1:                
                $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('plantilla/plantilla_diploma.docx');

                $phpWord->setImageValue(
                    'qrcode',
                    [
                        'path' => $path,
                        'width' => $with,
                        'height' => $with,
                        'ratio' => true
                    ]
                );                
                $phpWord->setValues([
                    'nombrecarrera' => $carNombre,
                    'nombreestudiante' => $estNombre,
                    'apellidoestudiante' => $estApellido,
                    'numregistro' => $numRegistro,

                    'dia' => date('d'),
                    'mes' => $mes_actual,         // para obtener el mes en texto en lugar de numero
                    'anio' => date('Y')
                ]);

                break;
            case 2:
                $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('plantilla/plantilla_certificado-CursoLibre-Especial.docx');

                $phpWord->setImageValue(
                    'qrcode',
                    [
                        'path' => $path,
                        'width' => $with,
                        'height' => $with,
                        'ratio' => true
                    ]
                );                
                $phpWord->setValues([
                    'nombrecarrera' => $carNombre,
                    'nombreestudiante' => $estNombre,
                    'apellidoestudiante' => $estApellido,
                    'numregistro' => $numRegistro,

                    'dia' => date('d'),
                    'mes' => $mes_actual,         // para obtener el mes en texto en lugar de numero
                    'anio' => date('Y')
                ]);
                break;
            case 3:
                $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('plantilla/plantilla_certificado-Bachillerato.docx');

                $phpWord->setImageValue(
                    'qrcode',
                    [
                        'path' => $path,
                        'width' => $with,
                        'height' => $with,
                        'ratio' => true
                    ]
                );                
                $phpWord->setValues([
                    'nombrecarrera' => $carNombre,
                    'nombreestudiante' => $estNombre,
                    'apellidoestudiante' => $estApellido,
                    'numregistro' => $numRegistro,

                    'dia' => date('d'),
                    'mes' => $mes_actual,         // para obtener el mes en texto en lugar de numero
                    'anio' => date('Y')
                ]);
                break;
            case 4:
                $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('plantilla/plantilla_certificadoPorCurso_Creditaje.docx');

                $phpWord->setImageValue(
                    'qrcode',
                    [
                        'path' => $path,
                        'width' => $with,
                        'height' => $with,
                        'ratio' => true
                    ]
                );                
                $phpWord->setValues([
                    'nombrecarrera' => $carNombre,
                    'nombreestudiante' => $estNombre,
                    'apellidoestudiante' => $estApellido,
                    'numregistro' => $numRegistro,

                    'dia' => date('d'),
                    'mes' => $mes_actual,         // para obtener el mes en texto en lugar de numero
                    'anio' => date('Y')
                ]);
                break;
            case 5:
                $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('plantilla/plantilla_certificado-Bachillerato-Alimentarias.docx');

                $phpWord->setImageValue(
                    'qrcode',
                    [
                        'path' => $path,
                        'width' => $with,
                        'height' => $with,
                        'ratio' => true
                    ]
                );                
                $phpWord->setValues([
                    'nombrecarrera' => $carNombre,
                    'nombreestudiante' => $estNombre,
                    'apellidoestudiante' => $estApellido,
                    'numregistro' => $numRegistro,

                    'dia' => date('d'),
                    'mes' => $mes_actual,         // para obtener el mes en texto en lugar de numero
                    'anio' => date('Y')
                ]);
                break;
            case 6:
                $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('plantilla/plantilla_certificadoEstudios_porCurso.docx');

                $phpWord->setImageValue(
                    'qrcode',
                    [
                        'path' => $path,
                        'width' => $with,
                        'height' => $with,
                        'ratio' => true
                    ]
                );                
                $phpWord->setValues([
                    'nombrecarrera' => $carNombre,
                    'nombreestudiante' => $estNombre,
                    'apellidoestudiante' => $estApellido,
                    'numregistro' => $numRegistro,

                    'dia' => date('d'),
                    'mes' => $mes_actual,         // para obtener el mes en texto en lugar de numero
                    'anio' => date('Y')
                ]);
                break;
                
                case 7:
                    $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('plantilla/plantilla_certificado-Bach-mec.docx');
    
                    $phpWord->setImageValue(
                        'qrcode',
                        [
                            'path' => $path,
                            'width' => $with,
                            'height' => $with,
                            'ratio' => true
                        ]
                    );                
                    $phpWord->setValues([
                        'nombrecarrera' => $carNombre,
                        'nombreestudiante' => $estNombre,
                        'apellidoestudiante' => $estApellido,
                        'numregistro' => $numRegistro,
    
                        'dia' => date('d'),
                        'mes' => $mes_actual,         // para obtener el mes en texto en lugar de numero
                        'anio' => date('Y')
                    ]);
                    break;

            default:
                echo "por defecto";
        }



            // Nombre del archivo .docx
            $nombre = time() . '.docx';

            $phpWord->saveAs($nombre);
    
            //Funcion para eliminar el archivo png del codigo QR
            Storage::delete('public/' . $output_file);
    
            return response()->download($nombre)->deleteFileAfterSend(true);

    }
}
