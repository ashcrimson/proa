<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Solicitud
 * @package App\Models
 * @version September 17, 2021, 5:52 pm CST
 *
 * @property \App\Models\SolicitudEstado $estado
 * @property \App\Models\Paciente $paciente
 * @property \App\Models\User $userCrea
 * @property \App\Models\User $userActualiza
 * @property \Illuminate\Database\Eloquent\Collection $cultivos
 * @property \Illuminate\Database\Eloquent\Collection $diagnosticos
 * @property \Illuminate\Database\Eloquent\Collection $medicamentos
 * @property \Illuminate\Database\Eloquent\Collection $microorganismos
 * @property string $codigo
 * @property integer $correlativo
 * @property integer $paciente_id
 * @property integer $estado_id
 * @property boolean $inicio
 * @property boolean $continuacion
 * @property boolean $terapia_empirica
 * @property boolean $terapia_especifica
 * @property boolean $infeccion_extrahospitalaria
 * @property boolean $infeccion_intrahospitalaria
 * @property boolean $disfuncion_renal
 * @property boolean $disfuncion_hepatica
 * @property number $creatinina
 * @property number $peso
 * @property string $observaciones
 * @property integer $user_crea
 * @property integer $user_actualiza
 */
class Solicitud extends Model
{
    use SoftDeletes;

    public $table = 'solicitudes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'codigo',
        'correlativo',
        'paciente_id',
        'estado_id',
        'inicio',
        'continuacion',
        'terapia_empirica',
        'terapia_especifica',
        'infeccion_extrahospitalaria',
        'infeccion_intrahospitalaria',
        'disfuncion_renal',
        'disfuncion_hepatica',
        'creatinina',
        'peso',
        'observaciones',
        'user_crea',
        'user_actualiza'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'correlativo' => 'integer',
        'paciente_id' => 'integer',
        'estado_id' => 'integer',
        'inicio' => 'boolean',
        'continuacion' => 'boolean',
        'terapia_empirica' => 'boolean',
        'terapia_especifica' => 'boolean',
        'infeccion_extrahospitalaria' => 'boolean',
        'infeccion_intrahospitalaria' => 'boolean',
        'disfuncion_renal' => 'boolean',
        'disfuncion_hepatica' => 'boolean',
        'creatinina' => 'decimal:2',
        'peso' => 'decimal:2',
        'observaciones' => 'string',
        'user_crea' => 'integer',
        'user_actualiza' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'inicio' => 'nullable|boolean',
        'continuacion' => 'nullable|boolean',
        'terapia_empirica' => 'nullable|boolean',
        'terapia_especifica' => 'nullable|boolean',
        'infeccion_extrahospitalaria' => 'nullable|boolean',
        'infeccion_intrahospitalaria' => 'nullable|boolean',
        'disfuncion_renal' => 'nullable|boolean',
        'disfuncion_hepatica' => 'nullable|boolean',
        'creatinina' => 'nullable|numeric',
        'peso' => 'nullable|numeric',
        'observaciones' => 'nullable|string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\SolicitudEstado::class, 'estado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'paciente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userCrea()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_crea');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userActualiza()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_actualiza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function cultivos()
    {
        return $this->belongsToMany(\App\Models\Cultivo::class, 'cultivo_has_solicitud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function diagnosticos()
    {
        return $this->belongsToMany(\App\Models\Diagnostico::class, 'diagnostico_has_solicitud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function medicamentos()
    {
        return $this->hasMany(\App\Models\SolicitudMedicamento::class, 'solicitud_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function microoganismos()
    {
        return $this->hasMany(\App\Models\SolicitudMicrooganismo::class, 'solicitud_id');
    }


    public function esTemporal()
    {
        return $this->estado_id==SolicitudEstado::TEMPORAL;
    }

    public function getColor()
    {
        switch ($this->estado){
            case SolicitudEstado::INGRESADA:
            case SolicitudEstado::INGRESADA:
        }
    }
}
