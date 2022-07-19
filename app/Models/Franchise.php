<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Marketer;
use Auth;



class Franchise extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'franchise_id',
        'username',
        'phone',
        'name',
        'email',
        'balance',
        'password',
        'terms',
        'marketer_count',
        'franchise_state'
        
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

    protected $table = "franchises";

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transactions () {
        return $this->hasMany(Transaction::class);
    }
    public function marketers () {
        
        return $this->hasMany(Marketer::class);
    }

    public function withdrawals () {
        return $this->hasMany(Withdrawal::class);
    }
    
    public function franchise () {
        return $this->hasMany(Franchise::class);
    }
    public function payments () {
        return $this->hasMany(Payment::class);
    }

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
    //return $this->referral_link = route('marketer.register', ['/ref/'.$this->id]);
    //return $this->referral_link = route('marketer.register', ['/ref/' => $this->id]);
    return $this->referral_link = route('marketer.register', ['ref' => $this->username]);
    
    //return $this->referral_link = route('marketer.ref', ['ref' => $this->username]);

}



}
