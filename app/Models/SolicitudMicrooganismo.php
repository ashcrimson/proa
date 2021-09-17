<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class SolicitudMicrooganismo
 * @package App\Models
 * @version September 17, 2021, 12:05 am CST
 *
 * @property \App\Models\Microorganismo $microorganismo
 * @property \App\Models\Solicitude $solicitud
 * @property integer $solicitud_id
 * @property integer $microorganismo_id
 * @property string $susceptibilidad
 */
class SolicitudMicrooganismo extends Model
{
    use SoftDeletes;

    public $table = 'solicitud_microorganismos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'solicitud_id',
        'microorganismo_id',
        'susceptibilidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'solicitud_id' => 'integer',
        'microorganismo_id' => 'integer',
        'susceptibilidad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'solicitud_id' => 'required',
        'microorganismo_id' => 'required',
        'susceptibilidad' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function microorganismo()
    {
        return $this->belongsTo(\App\Models\Microorganismo::class, 'microorganismo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function solicitud()
    {
        return $this->belongsTo(\App\Models\Solicitude::class, 'solicitud_id');
    }
}
