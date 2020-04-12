<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalur_pendakian extends Model
{
    //

    public function user()
    {
      return $this->belongsTo('App\User', 'create_id');
    }
    
    
    
}
