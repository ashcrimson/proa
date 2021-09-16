<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class MedicamentoLaboratorio
 * @package App\Models
 * @version September 16, 2021, 4:41 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $medicamentos
 * @property string $nombre
 */
class MedicamentoLaboratorio extends Model
{
    use SoftDeletes;

    public $table = 'medicamento_laboratorios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
    public function medicamentos()
    {
        return $this->hasMany(\App\Models\Medicamento::class, 'laboratorio_id');
    }
}
