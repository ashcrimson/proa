<?php

namespace App\DataTables\Scopes;

use App\Models\SolicitudEstado;
use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ScopeSolicitudDataTable implements DataTableScope
{


    public $estados;
    public $servicios;
    public $users;
    public $pacientes;
    public $medicos;
    public $del;
    public $al;


    public function __construct()
    {
        $this->estados = request()->estados ?? null;
        $this->servicios = request()->servicios ?? null;
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

        if ($this->users){
            if (is_array($this->users)){
                $query->whereIn('user_crea',$this->users);
            }else{
                $query->where('user_crea',$this->users);
            }
        }

        if ($this->estados){
            if (is_array($this->estados)){
                $query->whereIn('estado_id',$this->estados);
            }else{
                $query->where('estado_id',$this->estados);
            }
        }

//        if ($this->estados){
//
//            if (is_array($this->estados)){
//
//
//                $estaEstadoIngresada = in_array(SolicitudEstado::INGRESADA,$this->estados);
//
//                //Cuando esta el esado ingresado se debe quitar par filtrar por el usuario
//                if ($estaEstadoIngresada){
//
//                    $this->estados = removeElementByValueArray($this->estados,SolicitudEstado::INGRESADA);
//
//                    $query->ingresadasDelUser()
//                        ->orWhereIn('estado_id',$this->estados);
//                }else{
//                    $query->whereIn('estado_id',$this->estados);
//                }
//            }else{
//
//                if ($this->estados==SolicitudEstado::INGRESADA){
//                    $query->ingresadasDelUser();
//                }else{
//
//                    $query->where('estado_id',$this->estados);
//                }
//            }
//        }


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

        if ($this->servicios){
            if (is_array($this->servicios)){
                $query->whereIn('descserv',$this->servicios);
            }else{

                $query->where('descserv',$this->servicios);
            }
        }

        if ($this->del && $this->al){

            $del = Carbon::parse($this->del);
            $al = Carbon::parse($this->al)->addDay();

            $query->whereBetween('fecha_solicita',[$del,$al]);
        }
    }
}
