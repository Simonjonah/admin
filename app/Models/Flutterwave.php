<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flutterwave extends Model
{
    use HasFactory;



     // the user has many transaction
     public function payments () {
        return $this->hasMany(Payment::class);
    }

    public function marketers(){
        
        return $this->hasMany(Marketer::class);
    }
}
