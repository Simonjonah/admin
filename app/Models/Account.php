<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Account",
 *      required={"user_id", "balance", "total_credit", "total_debit", "withdrawal_method", "applied_for_payout", "paid"},
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
 *          property="balance",
 *          description="balance",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="total_credit",
 *          description="total_credit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="total_debit",
 *          description="total_debit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="withdrawal_method",
 *          description="withdrawal_method",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="payment_email",
 *          description="payment_email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bank_name",
 *          description="bank_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bank_branch",
 *          description="bank_branch",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bank_account",
 *          description="bank_account",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="applied_for_payout",
 *          description="applied_for_payout",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="paid",
 *          description="paid",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="last_date_applied",
 *          description="last_date_applied",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="last_date_paid",
 *          description="last_date_paid",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="country",
 *          description="country",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="other_details",
 *          description="other_details",
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
class Account extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'accounts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'balance',
        'total_credit',
        'total_debit',
        'withdrawal_method',
        'payment_email',
        'bank_name',
        'bank_branch',
        'bank_account',
        'applied_for_payout',
        'paid',
        'last_date_applied',
        'last_date_paid',
        'country',
        'other_details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'balance' => 'float',
        'total_credit' => 'float',
        'total_debit' => 'float',
        'withdrawal_method' => 'string',
        'payment_email' => 'string',
        'bank_name' => 'string',
        'bank_branch' => 'string',
        'bank_account' => 'string',
        'applied_for_payout' => 'string',
        'paid' => 'string',
        'last_date_applied' => 'date',
        'last_date_paid' => 'date',
        'country' => 'string',
        'other_details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'balance' => 'required|numeric',
        'total_credit' => 'required|numeric',
        'total_debit' => 'required|numeric',
        'withdrawal_method' => 'required|string|max:255',
        'payment_email' => 'nullable|string|max:255',
        'bank_name' => 'nullable|string|max:255',
        'bank_branch' => 'nullable|string|max:255',
        'bank_account' => 'nullable|string|max:255',
        'applied_for_payout' => 'required|string|max:255',
        'paid' => 'required|string|max:255',
        'last_date_applied' => 'nullable',
        'last_date_paid' => 'nullable',
        'country' => 'nullable|string|max:255',
        'other_details' => 'nullable|string',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

     /**
     * Get the user associated with the account.
     */

    public function marketer() {
        return $this->belongsTo(Marketer::class, 'marketer_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
    
   public function account_histories()
   {
       return $this->hasMany('App\Models\AccountHistory');
   }

}
