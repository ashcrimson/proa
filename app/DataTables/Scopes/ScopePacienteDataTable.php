<?php

namespace App\DataTables\Scopes;

use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ScopePacienteDataTable implements DataTableScope
{

    public $del;
    public $al;

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if ($this->del && $this->al){
            $del = Carbon::parse($this->del);
            $al = Carbon::parse($this->al)->addDay();
//
//            dd($del,$al);
            $query->whereBetween('created_at',[$del,$al]);
        }
    }
}
