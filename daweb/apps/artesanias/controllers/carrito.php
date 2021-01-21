
<?php

importar('apps/artesanias/models/carrito');
importar('apps/artesanias/views/carrito');

class CarritoController extends Controller  {

    public function agregar(){
    	 $sql = "SELECT * FROM productos";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }

    public function listar(){
        $sql = "SELECT * FROM carrito";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
       $id              = $_POST['id']?? 0;
       $producto        = $_POST['producto'];
       $precio          = $_POST['precio'];
       $cantidad        = $_POST['cantidad'];
       //--- validar datos

       //--- asociar al modelo
       $this->model->id             = $id;
       $this->model->producto       = $producto;
       $this->model->precio         = $precio;
       $this->model->cantidad       = $cantidad;
       $this->model->save();
       //--- 
       HTTPHelper::go("/artesanias/carrito/listar");
    }

    public function eliminar($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/carrito/listar");
    }
}

?>