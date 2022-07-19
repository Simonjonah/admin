<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Buyer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'referrer_id',
        'username',
        'phone',
        'name',
        'email',
        'password',
        'buyer_count',
        
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


    public function referrer(){
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    public function referrals()
{
    return $this->hasMany(User::class, 'referrer_id', 'id');
}




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

public function marketer() {
    return $this->belongsTo(Marketer::class, 'marketer_id', 'id');
}
public function franchise() {
    return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
}
public function transactions () {

    return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
}
public function payments () {
    return $this->hasMany(Payment::class);
}
public function primvideos () {
    return $this->hasMany(Primvideo::class);
}

}
