<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";
    protected $fillable = ['id_barang', 'id_user'];
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang');
    }
}
