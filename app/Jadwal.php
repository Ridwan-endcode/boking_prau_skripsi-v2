<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    public function user()
    {
      return $this->belongsTo('App\User', 'create_id');
    }

    public function jalur_pendakian()
    {
      return $this->belongsTo('App\Jalur_pendakian', 'id_jalur');
    }

    public function pendakis()
    {
      return $this->belongsTo('App\Pendaki','	id_jadwal');
    }

    
}
