<?php

namespace App\Http\Controllers;

use App\Models\Certificado_qr;
use App\Models\Registro;
use App\Models\democerQR;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;

class CertificadoController extends Controller
{
    public function index(){                            // validacion: esta vista puede redireccionarse a otro lado        
        
        //return view('certificado.index');
        return redirect('http://itel.unjbg.edu.pe/');
    }
    public function show($gen_code = null){             // form donde muestro la consulta de si el certificado es valido o no
        
        $data = democerQR::join('detalle_documento', 'detalle_documento.detalldoc_id', '=', 'tramite.detalldoc_id')
                        ->join('carrera', 'carrera.car_cod', '=', 'tramite.car_cod')
                        ->join('estudiante', 'estudiante.est_cod', '=', 'tramite.est_cod')
                        ->where('tramite.detalldoc_codgen',$gen_code)
                        ->get([
                                'tramite.tram_id',
                                'tramite.tram_estado',
                                'tramite.tram_updated_at',
                                'tramite.detalldoc_Nomarchivo',
                                'tramite.detalldoc_codgen',
                                'carrera.car_nombre',
                                'estudiante.est_nombre',
                                'estudiante.est_apellido',
                                'detalle_documento.detalldoc_cod2'
                            ]);
                            
        if($gen_code){
            if(count($data) >= 1){
                return view('certificado.show', ['code' => $gen_code], compact('data'));
            }
            else{
                return redirect('http://itel.unjbg.edu.pe/');
                //return view('certificado.index');
            }
        }else{
            //$gen_code = "";
            //$Certificado_qr = "";
            //return view('certificado.index');
            return redirect('http://itel.unjbg.edu.pe/');
        }
                            
                            
        /*
        $Certificado_qr = Certificado_qr::select(
                                                    
                                                    'fecha_emision',
                                                    'certificado_code',
                                                    'razon',
                                                    'nombre_est',
                                                    'apellido_est',
                                                    'estudiante_code',
                                                    'gen_code',
                                                    'descripcion',
                                                    'documento',
                                                    'access_token',
                                                )->where('gen_code',$gen_code)->get();

        if($gen_code){
            if(count($Certificado_qr) >= 1){
                return view('certificado.show', ['code' => $gen_code], compact('Certificado_qr'));
            }
            else{
                return redirect('http://itel.unjbg.edu.pe/');
                //return view('certificado.index');
            }
        }else{
            //$gen_code = "";
            //$Certificado_qr = "";
            //return view('certificado.index');
            return redirect('http://itel.unjbg.edu.pe/');
        }
        */    
    }

    public function download(Request $request,$file){                   // controlador para el boton de descarga del certificado en pdf de la vista direccionada por el controlador show
        //echo('hola');
        return response()->download(public_path('storage/Archivos/'.$file));
    }
    
    
    


























    

}
