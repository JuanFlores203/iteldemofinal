<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\RegistroCertificadoQRController;
use App\Http\Controllers\RegistroController;
use App\Models\Certificado_qr;
use App\Models\RegistroCertificadoQR;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class );

//Route::get('certificado', [CertificadoController::class,'index']);  //home
Route::get('certificado/validacion/{gen_code?}', [CertificadoController::class,'show']);
//Route::get('certificado/validacion/{gen_code?}', [CertificadoController::class,'create']);
Route::get('download/{file}', [CertificadoController::class,'download']);

//Route::get('certificado/registro', [CertificadoController::class,'registro']);***
    // Route::get('certificado/registrar', [CertificadoController::class,'create']);
    // Route::get('certificado/create1', [CertificadoController::class,'create1']);
    // Route::get('certificado/registro', [CertificadoController::class,'registro']);
    // Route::post('certificado/uploaddata', [CertificadoController::class,'store']);
    // Route::post('certificado/delete/{id}', [CertificadoController::class,'destroy']);
//Route::post('uploaddata', [CertificadoController::class,'store']);
//Route::post('uploaddata',[CertificadoController::class,'insertar']);


// Route::get('certificado/registrar', [CertificadoController::class,'create']);
// Route::get('certificado/create1', [CertificadoController::class,'create1']);
// Route::get('certificado/registro', [CertificadoController::class,'registro']);
// Route::post('certificado/uploaddata', [CertificadoController::class,'store']);
// Route::post('certificado/delete/{id}', [CertificadoController::class,'destroy']);
Route::get('/certificado', function () {
        return view('registroCertificado.registro');
    });
//Route::get('/certificado/create', [RegistroCertificadoQRController::class,'create']);  //create
Route::resource('certificado', RegistroCertificadoQRController::class);

Route::get('/test/{id}', [RegistroCertificadoQRController::class, 'generatordocx'])->name('generatordoc');

Route::get('/certificado/{id}/cerGenerator', [RegistroCertificadoQRController::class,'cerGenerator']);  //create
