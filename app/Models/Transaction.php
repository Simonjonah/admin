<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Transaction",
 *      required={"user_id", "qrcode_id", "amount", "status"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qrcode_id",
 *          description="qrcode_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="transaction_id",
 *          description="transaction_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="owner_qrcode_id",
 *          description="owner_qrcode_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          description="message",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="qrcode_url",
 *          description="qrcode_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Transaction extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transactions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'qrcode_id',
        'marketer_id',
        'franchise_id',
        'transaction_id',
        'payment_id',
        'tx_ref',
        'email',
        'phone',
        'franchise_share',
        'marketer_share',
        'buyer_name',
        'franchise_phone',
        'franchise_email',
        'franchise_name',
        'marketer_phone',
        'marketer_email',
        'marketer_name',
        'owner_qrcode_id',
        'message',
        'amount',
        'qrcode_url',
        'video',
        'status',
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'marketer_id' => 'integer',
        'franchise_id' => 'integer',
        'payment_id' => 'integer',

        'qrcode_id' => 'integer',
        'transaction_id' => 'integer',
        'owner_qrcode_id' => 'integer',
        'message' => 'string',
        'amount' => 'float',
        'qrcode_url' => 'string',
        'status' => 'string',
        'video' => 'string',
        'video' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'qrcode_id' => 'required|integer',
        'transaction_id' => 'nullable|integer',
        'owner_qrcode_id' => 'nullable|integer',
        'message' => 'nullable|string',
        'amount' => 'required|numeric',
        'video' => 'nullable|file|mimetypes:video/mp4',


        'qrcode_url' => 'nullable|string|max:255',
        'status' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    // public function qrcode () {
    //     return $this->belongsTo('App\Models\Qrcode');
    // }

//this qrcode belongs to many user
   

    // public function buyers () {
    //     return $this->hasMany(Buyer::class);
    // }

    public function marketer () {
        return $this->belongsTo(Marketer::class, 'marketer_id', 'id');
    }

    public function franchise () {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }
    public function transaction() {
        return $this->belongsTo(Transaction::class, 'payment_id', 'id');
    }
    public function payment() {
        return $this->belongsTo(Payment::class, 'franchise_id', 'id');
    }
}
