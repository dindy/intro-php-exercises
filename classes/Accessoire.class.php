<?php

class Accessoire extends Produit {

    protected $category_name = 'Accessoires';

    public function __construct($data_product) {

        parent::__construct($data_product);
    }    
}