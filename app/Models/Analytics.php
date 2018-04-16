<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Analytics
 * @package App\Models
 * @version April 12, 2018, 8:37 am UTC
 *
 * @property string name
 * @property string email
 * @property string account_id
 * @property string property_id
 * @property string profile_id
 */
class Analytics extends Model
{
    use SoftDeletes;

    public $table = 'analytics';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'email',
        'account_id',
        'property_id',
        'profile_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'account_id' => 'string',
        'property_id' => 'string',
        'profile_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
    ];

    
}
