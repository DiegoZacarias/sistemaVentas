<?php

namespace chessShop\Repositories;

use chessShop\Product;

class ProductRepository {
    private $model;
    
    public function __construct(){
        $this->model = new Product();
    }

    public function findByName($q) {
        return $this->model->where('name', 'like', "%$q%")
                           ->get();
    }
}
