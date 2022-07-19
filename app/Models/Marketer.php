<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Franchise;
use App\Models\Buyer;


class Marketer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'franchise_id',
        'marketer_id',
        'username',
        'phone',
        'firstname',
        'lastname',
        'email',
        'balance',
        'password',
        'terms',
        'marketer_count',
        'referred_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

 //table name
 protected $table = 'marketers';

 
public function getReferralLinkAttribute()
{
    return $this->referral_link = route('buyer.register', ['ref'=>$this->username]);
}

public function buyers () {
    return $this->hasMany(Buyer::class);
}

public function payments () {
    return $this->hasMany(Payment::class);
}

public function accounts () {
    return $this->hasMany(Account::class);
}

public function transactions () {
    return $this->hasMany(Transaction::class, 'marketer_id', 'id');
}

public function franchise() {
    return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
}

public function flutterwave() {
    return $this->belongsTo(Flutterwave::class, 'marketer_id', 'id');
}

public function marwithdrawals () {
    return $this->hasMany(Marwithdrawal::class);
}

}
