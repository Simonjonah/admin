<?php

namespace App\Repositories;

use App\Models\Qrcode;
use App\Repositories\BaseRepository;

/**
 * Class QrcodeRepository
 * @package App\Repositories
 * @version March 11, 2022, 9:21 pm UTC
*/

class QrcodeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'qrcode_id',
        'payment_method',
        'subject',
        'class',
        'website',
        'subject_url',
        'qrcode_path',
        'amount',
        'callback_url',
        'status'
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
        return Qrcode::class;
    }
}
