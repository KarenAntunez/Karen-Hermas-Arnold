<?php

class RolesView  {

    public function agregar($list=[]){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/roles_agregar.html"); 
        $html = Template($str)->render_regex('LISTADO_ROLES', $list);
        print Template('Agregar roles')->show($html);
    } 

    public function editar($roles){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/roles_editar.html"); 
        $html = Template($str)->render($roles);
        print Template('Editar roles')->show($html);
    } 


    public function listar($list=array()) {
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/roles_listar.html"); 
        $html = Template($str)->render_regex('LISTADO_ROLES', $list);
        print Template('Listado de roles')->show($html);
    }

}

?>