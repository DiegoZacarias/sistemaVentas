<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table='detalle_venta';

    protected $primaryKey='id_detalle_venta';

    public $timestamps=false;


    protected $fillable =[
    
        'id_detalle_venta',
        'id_venta',
        'id_producto',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    protected $guarded =[

    ];
}
