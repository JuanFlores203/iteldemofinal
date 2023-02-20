<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroCertificadoQR extends Model
{
    use HasFactory;
    protected $table = "certificado_qr";
    protected $primaryKey="certqr_id";

    public $timestamps=True;

    protected $fillable=[
        'fecha_emision',
        'certificado_code',
        'razon',
        'nombre_est',
        'apellido_est',
        'estudiante_code',
        'descripcion',
        'documento',
    ];
}
