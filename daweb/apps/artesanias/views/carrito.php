<?php

class CarritoView  {
	
    public function agregar($productos=[]){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/carrito_agregar.html"); 
        $html = Template($str)->render_regex('LISTADO_PRODUCTOS', $productos);
        print Template('Agregar carrito')->show($html);
    } 

    public function listar($list=array()) {
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/carrito_listar.html"); 
        $html = Template($str)->render_regex('LISTADO_CARRITO', $list);
        print Template('Listado de carrito')->show($html);
    }
	
}

?>