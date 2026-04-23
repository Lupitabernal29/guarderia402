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
    public function registroCuenta()
    {
        return $this->belongsTo(RegistroCuenta::class, 'id_registrocuenta');
    }
}
