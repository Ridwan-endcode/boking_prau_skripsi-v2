<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaki extends Model
{
    public function orders()
    {
      return $this->belongsTo('App\Order', 'id_order');
    }

    public function pendakisjmlh()
    {
        return $this->belongsTo('App\Pendaki', 'id_order');
    }

    public function jadwal_jumlah()
    {
      return $this->belongsTo('App\Jadwal', 'id_jadwal');
    }
    
    
}
