<?php

namespace App\DataTables\Scopes;

use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ScopeSolicitud implements DataTableScope
{


    public $estados;
    public $pacientes;
    public $medicos;
    public $del;
    public $al;


    public function __construct()
    {
        $this->estados = request()->estados ?? null;
        $this->pacientes = request()->pacientes ?? null;
        $this->medicos = request()->medicos ?? null;
        $this->del = request()->del ?? null;
        $this->al = request()->al ?? null;
    }


    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if ($this->estados){
            if (is_array($this->estados)){
                $query->whereIn('estado_id',$this->estados);
            }else{
                $query->where('estado_id',$this->estados);
            }
        }

        if ($this->pacientes){
            $query->whereHas('paciente',function ($q){

                if (is_array($this->pacientes)){
                    $q->whereIn('id',$this->pacientes);
                }else{
                    $q->where('id',$this->pacientes);
                }
            });
        }

        if ($this->medicos){
            if (is_array($this->medicos)){
                $query->whereIn('user_crea',$this->medicos);
            }else{
                $query->where('user_crea',$this->medicos);
            }
        }

        if ($this->del && $this->al){

            $del = Carbon::parse($this->del);
            $al = Carbon::parse($this->al)->addDay();

            $query->whereBetween('created_at',[$del,$al]);
        }
    }
}
