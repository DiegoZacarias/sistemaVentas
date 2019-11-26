<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primaryKey='id_cliente';

    public $timestamps=false;


    protected $fillable =[
    
        'id_cliente',
        'nombre',
        'apellido',
        'direccion',
        'telefono'
    ];

    protected $guarded =[

    ];

}
