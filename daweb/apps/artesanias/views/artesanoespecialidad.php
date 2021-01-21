<?php

class UsuariorolView  {

    public function agregar($list=[]){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/usuariorol_agregar.html"); 
        $html = Template($str)->render_regex('LISTADO_USUARIOROL', $list);
        print Template('Agregar usuariorol')->show($html);
    } 

    public function editar($list=[], $usuariorol){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/usuariorol_editar.html"); 
        $html = Template($str)->render_regex('LISTADO_USUARIOROL', $list);
        $html = Template($html)->render($usuariorol);
        print Template('Agregar usuariorol')->show($html);
    } 

    public function listar($list=array()) {
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/usuariorol_listar.html"); 
        $html = Template($str)->render_regex('LISTADO_USUARIOROL', $list);
        print Template('Listado de usuariorol')->show($html);
    }

}

?>