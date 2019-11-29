<?php

class Piano extends Produit {
    
    public $sustain_pedal;
    
    protected $category_name = 'Pianos';

    public function __construct($data_product) {

        $this->sustain_pedal = $data_product['sustain_pedal'];

        parent::__construct($data_product);
    }

    public function hasSustainPedal() {
        return $this->sustain_pedal;
    }

}