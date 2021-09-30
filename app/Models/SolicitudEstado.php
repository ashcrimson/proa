<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class SolicitudEstado
 * @package App\Models
 * @version September 16, 2021, 3:17 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $solicitudes
 * @property string $nombre
 */
class SolicitudEstado extends Model
{
    use SoftDeletes;

    public $table = 'solicitud_estados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    const TEMPORAL =    1;
    const INGRESADA =   2;
    const SOLICITADA =  3;
    const APROBADA =    4;
    const DESPACHADA =  5;
    const RECHAZADA =   6;
    const ANULADA =     7;
    const VENCIDA =     8;
    const PARA_REGRESAR =     9;


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function solicitudes()
    {
        return $this->hasMany(\App\Models\Solicitude::class, 'estado_id');
    }
}
