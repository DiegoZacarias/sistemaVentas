<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
    public function detail(){
        return $this->hasMany('chessShop\InvoiceItem');
    }

    public function client(){
        return $this->belongsTo('chessShop\Client');
    }
}
