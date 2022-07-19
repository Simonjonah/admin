<?php

namespace App\Repositories;

use App\Models\Primvideo;
use App\Repositories\BaseRepository;

/**
 * Class PrimvideoRepository
 * @package App\Repositories
 * @version July 8, 2022, 3:07 pm UTC
*/

class PrimvideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'primvideo_id',
        'subject_count',
        'class',
        'subject',
        'video',
        'photo',
        'amount',
        'prim_topic',
        'description',
        'view_count'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Primvideo::class;
    }
}
