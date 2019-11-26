<?php

namespace chessShop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    
    protected $table='products';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    
        'id',
        'name',
        'price',
        'created_at',
        'updated_at'
    ];

    protected $guarded =[

    ];
}
