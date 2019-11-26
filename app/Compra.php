<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
   protected $table='compras';

    protected $primaryKey='id_compra';

    public $timestamps=false;


    protected $fillable =[
    
        'id_compra',
        'fecha_compra',
        'condicion',
        'total_compra'
    ];

    protected $guarded =[

    ];

}
