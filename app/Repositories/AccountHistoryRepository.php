<?php

namespace App\Repositories;

use App\Models\AccountHistory;
use App\Repositories\BaseRepository;

/**
 * Class AccountHistoryRepository
 * @package App\Repositories
 * @version March 16, 2022, 2:43 pm UTC
*/

class AccountHistoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account_id',
        'user_id',
        'message'
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
        return AccountHistory::class;
    }
}
