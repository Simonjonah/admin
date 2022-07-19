<?php

namespace App\Repositories;

use App\Models\Marketer;
use App\Repositories\BaseRepository;

/**
 * Class MarketerRepository
 * @package App\Repositories
 * @version February 19, 2022, 1:02 pm UTC
*/

class MarketerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'affiliate_id',
        'marketer_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'email_verified_at',
        'affiliate_code',
        'marketer_count'
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
        return Marketer::class;
    }
}
