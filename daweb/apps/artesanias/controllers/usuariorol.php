
<?php

importar('apps/artesanias/models/usuariorol');
importar('apps/artesanias/views/usuariorol');

class UsuariorolController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM usuariorol";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }

    public function editar($usuario_id=0){
        $sql= "SELECT  A.rol_usuario 
            FROM usuariorol A WHERE A.usuario_id=$usuario_id ";

        $sql = "SELECT C.usuario_id, C.rol_id, C.rol_usuario,
          if(A.rol_usuario=C.usuario_id,'selected','') as selected
         FROM usuariorol as C, ($sql) as A";
        $usuariorolListado = $this->model->query($sql);
        $usuariorol = $this->model->getByusuario_id($usuario_id);

        $this->view->editar($usuariorolListado, $usuariorol);
    }

    public function listar(){
        $sql = "SELECT * FROM usuariorol";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
        $usuario_id          = $_POST['usuario_id']?? 0;
        $rol_id = $_POST['rol_id'];
        $rol_usuario       = $_POST['rol_usuario'];
        //--- valusuario_idar datos
 
        //--- asociar al modelo
        $this->model->usuario_id=$usuario_id;
        $this->model->rol_id = $rol_id;
        $this->model->rol_usuario       = $rol_usuario;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/usuariorol/listar");
     }

     public function eliminar($usuario_id){
        $this->model->delete($usuario_id);
        HTTPHelper::go("/artesanias/usuariorol/listar");
    }

}

?>


