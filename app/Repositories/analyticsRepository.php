<?php

namespace App\Repositories;

use App\Models\Analytics;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class analyticsRepository
 * @package App\Repositories
 * @version April 12, 2018, 8:37 am UTC
 *
 * @method analytics findWithoutFail($id, $columns = ['*'])
 * @method analytics find($id, $columns = ['*'])
 * @method analytics first($columns = ['*'])
*/
class analyticsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'property_id',
        'account_id',
        'profile_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return analytics::class;
    }
}
