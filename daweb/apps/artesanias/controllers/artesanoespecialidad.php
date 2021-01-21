
<?php

importar('apps/artesanias/models/artesanoespecialidad');
importar('apps/artesanias/views/artesanoespecialidad');

class ArtesanoespecialidadController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM artesanoespecialidad";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }

    public function editar($artesano_id=0){
        $sql= "SELECT  A.rol_usuario 
            FROM artesanoespecialidad A WHERE A.artesano_id=$artesano_id ";

        $sql = "SELECT C.artesano_id, C.especialidad_id, C.rol_usuario,
          if(A.rol_usuario=C.artesano_id,'selected','') as selected
         FROM artesanoespecialidad as C, ($sql) as A";
        $artesanoespecialidadListado = $this->model->query($sql);
        $artesanoespecialidad = $this->model->getByusuario_id($artesano_id);

        $this->view->editar($artesanoespecialidadListado, $artesanoespecialidad);
    }

    public function listar(){
        $sql = "SELECT * FROM artesanoespecialidad";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
        $artesano_id          = $_POST['artesano_id']?? 0;
        $especialidad_id = $_POST['especialidad_id'];
        $rol_usuario       = $_POST['rol_usuario'];
        //--- valusuario_idar datos
 
        //--- asociar al modelo
        $this->model->artesano_id=$artesano_id;
        $this->model->especialidad_id = $especialidad_id;
        $this->model->rol_usuario       = $rol_usuario;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/artesanoespecialidad/listar");
     }

     public function eliminar($artesano_id){
        $this->model->delete($artesano_id);
        HTTPHelper::go("/artesanias/artesanoespecialidad/listar");
    }

}

?>


