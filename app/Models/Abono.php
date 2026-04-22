<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abono extends Model
{
    use SoftDeletes;

    protected $table = "abonos";
    protected $primaryKey = "id_abono";
    public $timestamps = false;

    protected $fillable = [
        "cantidad_abono",
        "fecha_abono",
        "id_registrocuenta"
    ];

    // ESTA ES LA FUNCIÓN QUE LARAVEL NO ENCUENTRA:
    // Asegúrate de que se llame registroCuenta (con C mayúscula)
    public function registroCuenta()
    {
        return $this->belongsTo(RegistroCuenta::class, 'id_registrocuenta');
    }
}