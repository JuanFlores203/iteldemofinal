<?php

namespace App\Http\Controllers;

use App\Models\RegistroCertificadoQR;
use App\Models\DemoRegistroCertificadoQR;
use App\Models\democerQR;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class RegistroCertificadoQRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DemoRegistroCertificadoQR::join('detalle_documento', 'detalle_documento.detalldoc_id', '=', 'tramite.detalldoc_id')
        ->join('carrera', 'carrera.car_cod', '=', 'tramite.car_cod')
        ->join('estudiante', 'estudiante.est_cod', '=', 'tramite.est_cod')
        ->where('tramite.tram_estado','=','culminado')
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
        return view('registroCertificado.registro',compact('data'));

        


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
    public function create()
    {
        return view('registroCertificado.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new RegistroCertificadoQR;
        
        $file=$request->documento;
        if(empty($file)){
            $data->documento="";
            //$data->documento=$request->documento->storeAs('Archivos',$filename);      // PARA GUARDAR EN STORAGE
        }else{
            $file=$request->documento;
            $filename=$file->getClientOriginalName();
            // $request->file->move(public_path().'/Archivos/',$filename);          //PARA GUARDAR EN PUBLIC
            //$data->documento=$filename;
            $request->documento->storeAs('public/Archivos',$filename);              // PARA GUARDAR EN STORAGE y solo con nombre de archivo en BD
            $data->documento=$filename;
            //$data->documento=$request->documento->storeAs('Archivos',$filename);      // PARA GUARDAR EN STORAGE
        }

        

        $data->fecha_emision=$request->fecha_emision;
        $data->certificado_code=$request->certificado_code;
        $data->razon=$request->razon;
        $data->nombre_est=$request->nombre_est;
        $data->apellido_est=$request->apellido_est;
        $data->estudiante_code=$request->estudiante_code;
        $data->descripcion=$request->descripcion;

        $data->save();
        return redirect()->back()->with('save','ok');

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
    public function edit($id)
    {
        $data=DemoRegistroCertificadoQR::join('detalle_documento', 'detalle_documento.detalldoc_id', '=', 'tramite.detalldoc_id')
        ->join('carrera', 'carrera.car_cod', '=', 'tramite.car_cod')
        ->join('estudiante', 'estudiante.est_cod', '=', 'tramite.est_cod')
        ->where('tramite.tram_id','=',$id)
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
        return view('registroCertificado.edit', compact('data2','data'));

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
    public function update(Request $request, $id)
    {
        $datos = request()->except(['tram_updated_at','_token','_method']);
        // $code= $id.substr($request->est_nombre, 0, 2).substr($request->apellido_est, 0, 2);

        $data = DemoRegistroCertificadoQR::findOrFail($id);
        //$code= $id.$data->est_cod;

        if(!empty($request->detalldoc_Nomarchivo)){
            $file=$request->detalldoc_Nomarchivo;
            $filename=$file->getClientOriginalName();
            // // $request->file->move(public_path().'/Archivos/',$filename);
            // //$data->documento=$filename;
            // $data->documento=$request->documento->storeAs('Archivos',$filename);
            $oldFile = $data->detalldoc_Nomarchivo;
            Storage::delete('public/Archivos/'.$oldFile);
            $request->file('detalldoc_Nomarchivo')->storeAs('public/Archivos',$filename); 
            $datos['detalldoc_Nomarchivo']=$filename;            
        }
        else{
            return redirect("certificado/$id/edit");
        }

        DemoRegistroCertificadoQR::where('tram_id',$id)->update($datos);
//             
        //$data2 = DemoRegistroCertificadoQR::findOrFail($id);
        //return view('registroCertificado.edit', compact('RegistroCertificadoQR')); nota: esta es la version cvr
        return redirect("certificado/$id/edit")->with('save','ok');                     //nota: esta para el alert de confirmación
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroCertificadoQR  $registroCertificadoQR
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //RegistroCertificadoQR $registroCertificadoQR
    {
        DemoRegistroCertificadoQR::destroy($id);
        //echo($id);
        return redirect('certificado')->with('eliminar','ok');
    }


    public function cerGenerator($id)
    {
        $data=DemoRegistroCertificadoQR::join('detalle_documento', 'detalle_documento.detalldoc_id', '=', 'tramite.detalldoc_id')
        ->join('carrera', 'carrera.car_cod', '=', 'tramite.car_cod')
        ->join('estudiante', 'estudiante.est_cod', '=', 'tramite.est_cod')
        ->where('tramite.tram_id','=',$id)
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
        return view('registroCertificado.cerGenerator', compact('data2','data'));

        //$data = DemoRegistroCertificadoQR::findOrFail($id);

        //return view('registroCertificado.edit', compact('data'));
    }
}
