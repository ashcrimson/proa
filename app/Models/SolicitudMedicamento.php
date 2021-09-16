<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class SolicitudMedicamento
 * @package App\Models
 * @version September 16, 2021, 5:24 pm CST
 *
 * @property \App\Models\Medicamento $medicamento
 * @property \App\Models\Solicitude $solicitud
 * @property integer $solicitud_id
 * @property integer $medicamento_id
 * @property string $dosis
 * @property string $frecuencia
 * @property string $periodo
 */
class SolicitudMedicamento extends Model
{
    use SoftDeletes;

    public $table = 'solicitud_medicamentos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'solicitud_id',
        'medicamento_id',
        'dosis',
        'frecuencia',
        'periodo',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'solicitud_id' => 'integer',
        'medicamento_id' => 'integer',
        'dosis' => 'string',
        'frecuencia' => 'string',
        'periodo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'solicitud_id' => 'required',
        'medicamento_id' => 'required',
        'dosis' => 'required|string|max:255',
        'frecuencia' => 'nullable|string|max:255',
        'periodo' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function medicamento()
    {
        return $this->belongsTo(\App\Models\Medicamento::class, 'medicamento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function solicitud()
    {
        return $this->belongsTo(\App\Models\Solicitude::class, 'solicitud_id');
    }
}
