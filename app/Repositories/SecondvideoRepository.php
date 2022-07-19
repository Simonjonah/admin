<?php

namespace App\Repositories;

use App\Models\Secondvideo;
use App\Repositories\BaseRepository;

/**
 * Class SecondvideoRepository
 * @package App\Repositories
 * @version February 19, 2022, 12:58 pm UTC
*/

class SecondvideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'subject_id',
        'subject_count',
        'class',
        'subject',
        'video',
        'photo',
        'amount'
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
        return Secondvideo::class;
    }
}
