
<?php

importar('apps/artesanias/models/especialidades');
importar('apps/artesanias/views/especialidades');

class EspecialidadesController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM especialidades";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }

    public function editar($id=0){
        $id= intval($id); 
        $rol = $this->model->getById($id);

        $this->view->editar($rol);
    }

    public function listar(){
        $sql = "SELECT * FROM especialidades";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
        $id          = $_POST['id']?? 0;
        $descripcion = $_POST['descripcion'];
        //--- validar datos
 
        //--- asociar al modelo
        $this->model->id=$id;
        $this->model->descripcion = $descripcion;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/especialidades/listar");
    }

    public function eliminar($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/especialidades/listar");
    }

}

?>


