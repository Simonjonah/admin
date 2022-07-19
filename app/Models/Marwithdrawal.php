<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Marwithdrawal extends Model
{
    use HasFactory;

    // use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'franchise_id',
        'marketer_id',
        'account_name',
        'account_type',
        'account_number',
        'bank',
        'withdrawal_name',
        'withdrawal_phone',
        'withdrawal_email',
        'withdrawal_amount',
        'status',
       
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    


//protected $appends = ['referral_link'];

/**
 * The accessors to append to the model's array form.
 *
 * @var array
 */
protected $appends = ['referral_link'];

/**
 * Get the user's referral link.
 *
 * @return string
 */
public function getReferralLinkAttribute()
{
    return $this->referral_link = route('register', ['ref' => $this->username]);
}

public function marketer(){
    return $this->belongsTo(marketer::class, 'marketer_id', 'id');
}
public function franchise() {
    return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
}
public function transaction () {

    return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
}

}


