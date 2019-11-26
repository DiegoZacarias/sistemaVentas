<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table='detalle_compra';

    protected $primaryKey='id_detalle';

    public $timestamps=false;


    protected $fillable =[
    
        'id_detalle',
        'id_compra',
        'id_producto',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    protected $guarded =[

    ];
}
