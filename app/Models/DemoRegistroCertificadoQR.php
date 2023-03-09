<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoRegistroCertificadoQR extends Model
{
    use HasFactory;

    protected $table = "tramite";
    protected $primaryKey="tram_id";

    public $timestamps=False;

    protected $fillable=[
        'tram_id',
        'tram_estado',
        'est_cod',
        'tram_observacion',
        'tram_updated_at',
        'detalldoc_Nomarchivo',
        'detalldoc_codgen',
        'car_nombre',
        'est_nombre',
        'est_apellido',
        'detalledoc_cod2'
    ];


}
