<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';

    protected $primaryKey='id_proveedor';

    public $timestamps=false;


    protected $fillable =[
    
        'id_proveedor',
        'descri_proveedor',
        'direccion_proveedor',
        'telefono_prov'
    ];

    protected $guarded =[

    ];
}
