<?php

class Carrito extends DAO {

    public function __construct() {
        $this->keyfield = "id";
        $this->id = 0;
        $this->producto = "";
		$this->precio = 0;
        $this->cantidad = 0;
    } 
}

?>