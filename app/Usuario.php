<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuario_pro';

    protected $primaryKey='id_usuario';

    public $timestamps=false;


    protected $fillable =[
    	'id_usuario',
    	'nombre',
    	'pass'
    ];

    protected $guarded =[

    ];
}
