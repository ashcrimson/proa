<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class FormaFarmaceutica
 * @package App\Models
 * @version September 16, 2021, 4:41 pm CST
 *
 * @property \App\Models\FormaFarmaceuticaTipo $tipo
 * @property \Illuminate\Database\Eloquent\Collection $medicamentos
 * @property string $nombre
 * @property integer $tipo_id
 */
class FormaFarmaceutica extends Model
{
    use SoftDeletes;

    public $table = 'formas_farmaceuticas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'tipo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tipo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'tipo_id' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipo()
    {
        return $this->belongsTo(\App\Models\FormaFarmaceuticaTipo::class, 'tipo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function medicamentos()
    {
        return $this->hasMany(\App\Models\Medicamento::class, 'forma_id');
    }
}
