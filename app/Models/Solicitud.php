<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Solicitud
 * @package App\Models
 * @version September 22, 2021, 4:17 pm CST
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
 * @property integer $clon
 * @property number $peso
 * @property string $otro_cultivo
 * @property string $otro_diagnostico
 * @property string $observaciones
 * @property integer $user_crea
 * @property string|\Carbon\Carbon $fecha_solicita
 * @property integer $user_autoriza
 * @property string|\Carbon\Carbon $fecha_autoriza
 * @property integer $user_despacha
 * @property string|\Carbon\Carbon $fecha_despacha
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
        'clon',
        'peso',
        'otro_cultivo',
        'otro_diagnostico',
        'observaciones',
        'user_crea',
        'fecha_solicita',
        'descserv',
        'ingreso',
        'inghosp',
        'nrocama',
        'codubic',
        'nropiso',
        'nropieza',
        'tipocama',
        'codserv',
        'codinst',
        'descinst',
        'user_autoriza',
        'fecha_autoriza',
        'user_despacha',
        'fecha_despacha',
        'user_actualiza',
        'fecha_inicio_tratamiento',
        'fecha_fin_tratamiento',
        'created_at',
        'updated_at'
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
        'otro_cultivo' => 'string',
        'otro_diagnostico' => 'string',
        'observaciones' => 'string',
        'user_crea' => 'integer',
        'fecha_solicita' => 'datetime',
        'fecha_inicio_tratamiento' => 'datetime',
        'fecha_fin_tratamiento' => 'datetime',

        'user_autoriza' => 'integer',
        'fecha_autoriza' => 'datetime',
        'user_despacha' => 'integer',
        'fecha_despacha' => 'datetime',
        'user_actualiza' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'run' => 'required|string|max:255',
        'dv_run' => 'required|string|max:255',

        'apellido_paterno' => 'required|string|max:255',
        'apellido_materno' => 'nullable|string|max:255',
        'primer_nombre' => 'required|string|max:255',
        'segundo_nombre' => 'nullable|string|max:255',

        'inicio' => 'nullable|boolean',
        'continuacion' => 'nullable|boolean',
        'terapia_empirica' => 'nullable|boolean',
        'terapia_especifica' => 'nullable|boolean',
        'infeccion_extrahospitalaria' => 'nullable|boolean',
        'infeccion_intrahospitalaria' => 'nullable|boolean',
        'disfuncion_renal' => 'nullable',
        'disfuncion_hepatica' => 'nullable',
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
    public function microorganismos()
    {
        return $this->hasMany(\App\Models\SolicitudMicroorganismo::class, 'solicitud_id');
    }


    public function esTemporal()
    {
        return $this->estado_id==SolicitudEstado::TEMPORAL;
    }

    public function getColor()
    {
        switch ($this->estado_id){
            case SolicitudEstado::SOLICITADA:
                if ($this->fecha_solicita){

                    $dif = $this->fecha_solicita->diffInHours(Carbon::now());

                    if ($dif >= 24 && $dif < 48){
                        return "#f3fa93";

                    }elseif ($dif >= 72){
                        $this->estado_id = SolicitudEstado::VENCIDA;
                        $this->save();
                        return "yellow";
                    }
                }

                break;
            case SolicitudEstado::APROBADA:
                return "#9ffa93";
                break;
            case SolicitudEstado::RECHAZADA:
                return "#ff7878";
                break;

            case SolicitudEstado::VENCIDA:
                return "yellow";
                break;
            default:
                return "";
        }
    }

    public function puedeEditar()
    {
        return in_array($this->estado_id,[
           SolicitudEstado::INGRESADA,
           SolicitudEstado::PARA_REGRESAR
        ]);
    }

    public function puedeEliminar()
    {
        return in_array($this->estado_id,[
            SolicitudEstado::INGRESADA
        ]);
    }

    public function puedeAprobar()
    {
        return in_array($this->estado_id,[
            SolicitudEstado::SOLICITADA,
            SolicitudEstado::VENCIDA,
        ]);
    }

    public function puedeDespachar()
    {
        return in_array($this->estado_id,[
            SolicitudEstado::SOLICITADA,
            SolicitudEstado::APROBADA
        ]);
    }

    public function puedeClonar()
    {
        $enEstadoRechazada = in_array($this->estado_id,[
                SolicitudEstado::RECHAZADA
            ]);

        return $enEstadoRechazada && is_null($this->clon);
    }

    public function puedeRegresar()
    {
        return in_array($this->estado_id,[
            SolicitudEstado::PARA_REGRESAR
        ]);
    }

    public function puedeCerrar()
    {
        return in_array($this->estado_id,[
            SolicitudEstado::SOLICITADA
        ]);
    }

    /**
     * @return Solicitud
     */
    public function clonar()
    {
        /**
         * @var Solicitud $nueva
         */
        $nueva = new Solicitud($this->toArray());

        $nueva->save();
        $nueva->cultivos()->sync($this->cultivos->pluck('id')->toArray());
        $nueva->diagnosticos()->sync($this->diagnosticos->pluck('id')->toArray());

        $medicamentos = [];
        foreach ($this->medicamentos as $index => $medicamento) {
            $medicamentos[] = new SolicitudMedicamento($medicamento->toArray());
        }
        $nueva->medicamentos()->saveMany($medicamentos);

        $microorganismos = [];
        foreach ($this->microorganismos as $index => $microorganismo) {
            $microorganismos[] = new SolicitudMicroorganismo($microorganismo->toArray());
        }
        $nueva->microorganismos()->saveMany($microorganismos);
        $nueva->estado_id = SolicitudEstado::PARA_REGRESAR;
        $nueva->save();

        //guarda el id de la nueva solicitud en la antigua
        $this->clon = $nueva->id;
        $this->save();

        return $nueva;
    }

    public function scopeIngresadasDelUser($query,$user = null)
    {

        $user = $user ?? auth()->user()->id ?? request()->user_id;

        $query->where(function ($query) use ($user){
            $query->where('user_crea',$user)
                ->where('estado_id',SolicitudEstado::INGRESADA);
        });

    }

    public function medicamentosDespachados()
    {
        $pendientes = $this->medicamentos->sum('pendientes_despachar');

        return $pendientes == 0;
    }

    public function scopeVigentes($query)
    {
        $query->whereIn('estado_id',[
            SolicitudEstado::INGRESADA,
            SolicitudEstado::SOLICITADA,
            SolicitudEstado::APROBADA,
            SolicitudEstado::DESPACHADA,
            SolicitudEstado::RECHAZADA,
            SolicitudEstado::ANULADA,
            SolicitudEstado::VENCIDA,
            SolicitudEstado::PARA_REGRESAR,
        ]);
    }

    public function depurar()
    {
        if ($this->estado_id==SolicitudEstado::RECHAZADA || $this->estado_id==SolicitudEstado::VENCIDA){
            $dias = Carbon::now()->diffInDays($this->created_at);

            if ($dias > 7){
                $this->delete();

                return true;
            }
        }

        return false;
    }

}
