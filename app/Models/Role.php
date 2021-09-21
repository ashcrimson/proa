<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version January 30, 2020, 4:01 pm CST
 *
 * @property \App\Models\ModelHasRole modelHasRole
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property string name
 * @property string guard_name
 */
class Role extends \Spatie\Permission\Models\Role
{

    public $table = 'roles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const DEVELOPER =   1;
    const SUPERADMIN =  2;
    const ADMIN =       3;
    const MEDICO =      4;
    const INFECTOLOGO = 5;
    const QF_CLÍNICO =  6;
    const TECNICO  =    7;
    const ENFERMERA =   8;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'guard_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'guard_name' => 'required'
    ];


}
