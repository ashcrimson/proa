<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class FarmacoCategoria
 * @package App\Models
 * @version September 16, 2021, 3:24 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $medicamentos
 * @property \Illuminate\Database\Eloquent\Collection $farmacos
 * @property string $nombre
 */
class FarmacoCategoria extends Model
{
    use SoftDeletes;

    public $table = 'farmaco_categorias';
    
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function medicamentos()
    {
        return $this->belongsToMany(\App\Models\Medicamento::class, 'categoria_has_medicamento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function farmacos()
    {
        return $this->hasMany(\App\Models\Farmaco::class, 'categoria_id');
    }
}
