<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistroCuenta extends Model
{
    use SoftDeletes;

    protected $table = "registro_cuentas";
    protected $primaryKey = "id_registrocuenta";
    public $timestamps = false;

    protected $fillable = [
        "numero_cuenta",
        "id_familiar"
    ];

    public function familiar()
    {
        return $this->belongsTo(Familiar::class, 'id_familiar');
    }

    public function abonos()
    {
        return $this->hasMany(Abono::class, 'id_registrocuenta');
    }
}
