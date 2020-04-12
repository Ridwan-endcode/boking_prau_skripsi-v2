<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function pendakis()
    {
      return $this->belongsTo('App\Pendaki', 'id_pendaki');
    }

    public function jadwals()
    {
      return $this->belongsTo('App\Jadwal', 'id_jadwal');
    }

    public function jalur_pendakis()
    {
      return $this->belongsTo('App\Jalur_pendakian', 'id_jalur');
    }

    public function transak()
    {
      return $this->belongsTo('App\Transaksi', 'id_transaksi');
    }

    public function users()
    {
      return $this->belongsTo('App\User', 'status_bayar');
    }

}
