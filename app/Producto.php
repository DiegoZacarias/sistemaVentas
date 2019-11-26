<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';

    protected $primaryKey='id_producto';

    public $timestamps=false;


    protected $fillable =[
    
        'id_producto',
        'descri_producto',
        'cantidad_existencia',
        'precio_compra',
        'precio_venta',
        'id_proveedor'
    ];

    protected $guarded =[

    ];
}
