<?php

namespace Wes\Mvc\Models;

use Wes\Mvc\Core\Model;

class Products extends Model
{

    public function __construct()
    {
        parent::__construct('products');

    }

    function getAll(): iterable
    {
        return $this->DB()->query("select * from products")->fetchAll();

    }

    function getAllAvailableProducts(): iterable
    {
        return $this->DB()->query("select * from products where product_available is not null")->fetchAll();

    }

    function getByID($id)
    {
        return $this->DB()->query("select * from products where id = $id")->fetch();
    }



}