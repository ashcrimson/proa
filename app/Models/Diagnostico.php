<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Diagnostico
 * @package App\Models
 * @version September 16, 2021, 3:17 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $solicitudes
 * @property string $nombre
 */
class Diagnostico extends Model
{
    use SoftDeletes;

    public $table = 'diagnosticos';
    
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
    public function solicitudes()
    {
        return $this->belongsToMany(\App\Models\Solicitude::class, 'diagnostico_has_solicitud');
    }
}
