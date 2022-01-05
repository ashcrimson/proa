<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class SolicitudMedicamento
 * @package App\Models
 * @version January 4, 2022, 11:46 pm -03
 *
 * @property \App\Models\Medicamento $medicamento
 * @property \App\Models\Solicitud $solicitud
 * @property integer $solicitud_id
 * @property integer $medicamento_id
 * @property number $dosis_valor
 * @property string $dosis_unidad
 * @property integer $frecuencia_valor
 * @property string $frecuencia_unidad
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
        'dosis_valor',
        'dosis_unidad',
        'frecuencia_valor',
        'frecuencia_unidad',
        'periodo'
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
        'dosis_valor' => 'decimal:2',
        'dosis_unidad' => 'string',
        'frecuencia_valor' => 'integer',
        'frecuencia_unidad' => 'string',
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
        'dosis_valor' => 'required|numeric',
        'dosis_unidad' => 'required|string|max:255',
        'frecuencia_valor' => 'nullable|integer',
        'frecuencia_unidad' => 'nullable|string|max:255',
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
