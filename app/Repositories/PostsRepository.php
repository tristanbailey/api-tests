<?php

namespace App\Repositories;

use App\Models\Posts;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PostsRepository
 * @package App\Repositories
 * @version April 12, 2018, 9:31 am UTC
 *
 * @method Posts findWithoutFail($id, $columns = ['*'])
 * @method Posts find($id, $columns = ['*'])
 * @method Posts first($columns = ['*'])
*/
class PostsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'desc'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Posts::class;
    }
}
