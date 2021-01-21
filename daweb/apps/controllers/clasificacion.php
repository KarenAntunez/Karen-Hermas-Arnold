

<?php

class Clasificacion extends DAO {

    public function __construct() {
        $this->keyfield = "id";
        $this->id = 0;
        $this->descripcion = "";
        $this->padre = 0;
    } 

    public function agregar(){
        $sql = "SELECT * FROM clasificacion";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }


    public function guardar(){
        $descripcion = $_POST['descripcion'];
        $padre       = $_POST['padre'];
        //--- validar datos
 
        //--- asociar al modelo
        $this->model->descripcion = $descripcion;
        $this->model->padre       = $padre;
        $this->model->save();
        //--- 
        HTTPHelper::go("/artesanias/clasificacion/listar");
     }
 

}

?>