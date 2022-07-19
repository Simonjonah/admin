<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;

    public $fillable = [
        'buyer_id',
        'transaction_id',
        'marketer_id',
        'franchise_id',
        'name',
        'amount',
        'subject',
        'class',
        'phone_number',
        'email',
        'name',
        'primvideo_id',
        'reference',
        'fee',
        'video',
        'franchise_share',
        'marketer_share',
        'marketer_name',
        'marketer_email',
        'marketer_phone',
        'franchise_name',
        'franchise_email',
        'franchise_phone',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'amount' => 'required|string|max:255',
       
        'video' => 'string',

        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


     /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'buyer_id' => 'integer',
        'transaction_id' => 'integer',
        'marketer' => 'integer',
        'franchise' => 'integer',
        'name' => 'string',
        'class' => 'string',
        'subject' => 'string',
        'amount' => 'string',
        'fee' => 'string',
        //'video' => 'nullable|file|mimetypes:video/mp4'

        
        
    ];


    

    public function marketer() {
        return $this->belongsTo(Marketer::class, 'marketer_id', 'id');
    }

    public function franchise() {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }
    
    public function transaction() {
        return $this->hasMany(Transaction::class, 'payment_id', 'id');
    } 
    public function buyer () {
        return $this->belongsTo(Buyer::class, 'buyer_id', 'id');
    }
    public function primvideos () {
        return $this->hasMany(Primvideo::class);
    }
    // public function primvideos()
    // {
    //     return $this->belongsToMany(Primvideo::class);
    // }
    

}
