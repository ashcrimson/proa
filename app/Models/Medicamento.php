<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Medicamento
 * @package App\Models
 * @version September 16, 2021, 3:50 pm CST
 *
 * @property \App\Models\MedicamentoLaboratorio $laboratorio
 * @property \App\Models\MedicamentoViasAdmin $viaAdmin
 * @property \App\Models\FormasFarmaceutica $forma
 * @property \Illuminate\Database\Eloquent\Collection $farmacoCategorias
 * @property \Illuminate\Database\Eloquent\Collection $medicamentoFarmacos
 * @property \Illuminate\Database\Eloquent\Collection $solicitudMedicamentos
 * @property string $nombre
 * @property string $indicaciones
 * @property string $contraindicaciones
 * @property string $advertencias
 * @property string $dosis
 * @property integer $via_admin
 * @property integer $laboratorio_id
 * @property integer $forma_id
 * @property boolean $receta
 * @property number $cantidad_total
 * @property number $cantidad_formula
 * @property string $generico
 */
class Medicamento extends Model
{
    use SoftDeletes;

    public $table = 'medicamentos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'indicaciones',
        'contraindicaciones',
        'advertencias',
        'dosis',
        'via_admin',
        'laboratorio_id',
        'forma_id',
        'receta',
        'cantidad_total',
        'cantidad_formula',
        'generico'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'indicaciones' => 'string',
        'contraindicaciones' => 'string',
        'advertencias' => 'string',
        'dosis' => 'string',
        'via_admin' => 'integer',
        'laboratorio_id' => 'integer',
        'forma_id' => 'integer',
        'receta' => 'boolean',
        'cantidad_total' => 'decimal:2',
        'cantidad_formula' => 'decimal:2',
        'generico' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'indicaciones' => 'nullable|string|max:45',
        'contraindicaciones' => 'nullable|string|max:45',
        'advertencias' => 'nullable|string|max:45',
        'dosis' => 'nullable|string|max:45',
        'via_admin' => 'nullable',
        'laboratorio_id' => 'nullable',
        'forma_id' => 'nullable',
        'receta' => 'nullable|boolean',
        'cantidad_total' => 'nullable|numeric',
        'cantidad_formula' => 'nullable|numeric',
        'generico' => 'nullable|string|max:45',
        'created_at' => 'nullable|string|max:45',
        'updated_at' => 'nullable|string|max:45',
        'deleted_at' => 'nullable|string|max:45'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function laboratorio()
    {
        return $this->belongsTo(\App\Models\MedicamentoLaboratorio::class, 'laboratorio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function viaAdmin()
    {
        return $this->belongsTo(\App\Models\MedicamentoViasAdmin::class, 'via_admin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function forma()
    {
        return $this->belongsTo(\App\Models\FormasFarmaceutica::class, 'forma_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function farmacoCategorias()
    {
        return $this->belongsToMany(\App\Models\FarmacoCategoria::class, 'categoria_has_medicamento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function medicamentoFarmacos()
    {
        return $this->hasMany(\App\Models\MedicamentoFarmaco::class, 'medicamento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function solicitudMedicamentos()
    {
        return $this->hasMany(\App\Models\SolicitudMedicamento::class, 'medicamento_id');
    }
}
