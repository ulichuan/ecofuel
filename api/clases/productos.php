<?php
class Productos extends conexionBD
{
    public function newProduct()
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        //Elementos
        $name_p = $_POST['producto'];
        $precio_litro = $_POST['precio_litro'];
        $unidad = $_POST['unidad'];
        $precio_unidad = $_POST['precio_unidad'];
        $moneda = $_POST['moneda'];
        $litros = $_POST['litros'];
        //Validaciones
        if(!isset($name_p)){
            $error[] = 'Debe de proporcionar un nombre.';
        }
        //guardamos
        if(!isset($error)){
            try 
            {
                $insert = $db->prepare("INSERT INTO productos
                (producto,precio_litro,unidad,precio_unidad,moneda,litros) VALUES 
                (:name_p,:precio_litro,:unidad,:precio_unidad,:moneda,:litros)");
                $insert->bindParam(':name_p',$name_p, PDO::PARAM_STR);
                $insert->bindParam(':precio_litro',$precio_litro, PDO::PARAM_STR);
                $insert->bindParam(':unidad',$unidad, PDO::PARAM_STR);
                $insert->bindParam(':precio_unidad',$precio_unidad, PDO::PARAM_STR);
                $insert->bindParam(':moneda',$moneda, PDO::PARAM_STR);
                $insert->bindParam(':litros',$litros, PDO::PARAM_STR);
                //Esecute
                $insert->execute();
                header('Location: '.DIR.'api/index.php?des=admin&page=lista_productos');
			    exit;
            }
            catch(PDOException $e)
            {
                $error[] = $e->getMessage();
            }
        }
    }

    public function updateProduct($edp_id,$edp_name,$edp_p_litro,$edp_unidad,$edp_p_unidad,$edp_moneda,$edp_litros)
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        $update = $db->prepare("UPDATE productos SET producto=:edp_name, precio_litro=:edp_p_litro, unidad=:edp_unidad, precio_unidad=:edp_p_unidad, moneda=:edp_moneda, litros=:edp_litros WHERE id=:edp_id");
        $update->bindParam(':edp_id',$edp_id,PDO::PARAM_INT);
        $update->bindParam(':edp_name',$edp_name,PDO::PARAM_STR);
        $update->bindParam(':edp_p_litro',$edp_p_litro,PDO::PARAM_STR);
        $update->bindParam(':edp_unidad',$edp_unidad,PDO::PARAM_STR);
        $update->bindParam(':edp_p_unidad',$edp_p_unidad,PDO::PARAM_STR);
        $update->bindParam(':edp_moneda',$edp_moneda,PDO::PARAM_STR);
        $update->bindParam(':edp_litros',$edp_litros,PDO::PARAM_STR);

        $update->execute();

        if($update->rowCount() > 0)
        {
            $count = $update -> rowCount();
            echo "<div class='content alert alert-primary' >
            Gracias: $count registro ha sido actualizado </div>";
        }
        else
        {
            echo "<div class='content alert alert-danger'> No se pudo actulizar el registro </div>";
            print_r($update->errorInfo()); 
        }
    }

    public function allProducts() 
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        $select = $db->prepare("SELECT * FROM productos");
        $select ->execute();
        $mData=array();
        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"]="Error de consulta de ejecución, porque: ". $db->errorInfo()[2];
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row;
            }
        }
        return $mData;
    }

    public function productoById($id)
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        $select = $db->prepare("SELECT * FROM productos WHERE id=:id");
        $select->bindValue(':id', "l'asdas'", PDO::PARAM_INT);
        $select ->execute(array('id' => $id));
        $mData=array();
        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"]="Error de consulta de ejecución, porque: ". $db->errorInfo()[2];
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row;
            }
        }
        return $mData;
    }

}