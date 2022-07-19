<?php

namespace App\Repositories;

use App\Models\Buyer;
use App\Repositories\BaseRepository;

/**
 * Class BuyerRepository
 * @package App\Repositories
 * @version May 24, 2022, 9:59 am UTC
*/

class BuyerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'franchise_id',
        'marketer_id',
        'name',
        'phone',
        'username',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
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
        return Buyer::class;
    }
}
