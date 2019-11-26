<?php

namespace chessShop\Repositories;

use chessShop\Client;

class ClientRepository {
    private $model;
    
    public function __construct(){
        $this->model = new Client();
    }

    public function findByName($q) {
        return $this->model->where('name', 'like', "%$q%")
                           ->get();
    }
}
