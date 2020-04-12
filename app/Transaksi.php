<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  public function orders()
  {
    return $this->belongsTo('App\Order', 'id_order');
  }
}
