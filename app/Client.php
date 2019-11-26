<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {
	protected $table='clients';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    
        'id',
        'name',
        'ruc',
        'address',
        'created_at',
        'updated_at'
    ];

    protected $guarded =[

    ];
}
