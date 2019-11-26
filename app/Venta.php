<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
     protected $table='venta';

    protected $primaryKey='id_venta';

    public $timestamps=false;


    protected $fillable =[
    
        'id_venta',
        'fecha_venta',
        'condicion_venta',
        'total_venta',
        'id_cliente'
    ];

    protected $guarded =[

    ];
}
