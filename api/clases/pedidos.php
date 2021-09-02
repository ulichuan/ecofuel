<?php
class Pedido extends conexionBD
{
    public function newPedido()
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        //Values
        $company = $_POST['empresa'];
        $usuario = $_POST['usuario'];
        $producto = $_POST['products'];
        $fecha = $_POST['indate'];
        //$fecha->format('d-m-Y');
        /* $dia = $_POST['p_day'];
        $mes = $_POST['p_month'];
        $anio = $_POST['p_year']; */
        $hora = $_POST['h_pedido'];
        $unidades = $_POST['p_unidades'];
        $litros = $_POST['p_litros'];
        $d_pedido = $_POST['d_pedido'];
        $h_pedido = $_POST['h_pedido'];
        //Creamos la fecha de recogida
        //$fecha = $dia."-".$mes."-".$anio;
        //Creamos la cantidad
        if($unidades == "") $unidades = 0;
        if($litros == "") $litros = 0;
        $cantidad = "Unidades: ".$unidades." / Litros: ".$litros;
        // Insertamos
        try
        {
            // Insert Query
            $insert=$db->prepare('INSERT INTO pedidos (empresa,usuario,producto,fecha,hora,cantidad,dia_pedido,hora_pedido) 
            VALUES (:company,:usuario,:producto,:fecha,:hora,:cantidad,:d_pedido,:h_pedido)');
            $insert->bindParam(':company',$company, PDO::PARAM_STR);
            $insert->bindParam(':usuario',$usuario, PDO::PARAM_STR);
            $insert->bindParam(':producto',$producto, PDO::PARAM_STR);
            $insert->bindParam(':fecha',$fecha, PDO::PARAM_STR);
            $insert->bindParam(':hora',$hora, PDO::PARAM_STR);
            $insert->bindParam(':cantidad',$cantidad, PDO::PARAM_STR);
            $insert->bindParam(':d_pedido',$d_pedido, PDO::PARAM_STR);
            $insert->bindParam(':h_pedido',$h_pedido, PDO::PARAM_STR);
            // Execute
            $insert->execute();
            $ultimoId = $db->lastInsertId();
            if($ultimoId)
            {
                $count = $insert->rowCount();
                echo "<div class='content alert alert-primary' >
                Gracias: $count registro creado con exito</div>";
                header('Location: '.DIR.'/api/index.php?des=cliente&page=lista_pedidos');
            }
            else
            {
                $errorMsg="<div class='content alert alert-danger'> Error en registro 'dardo'</div>";
                return $errorMsg;
                print_r("---->".$insert->errorInfo()); 
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function deletePedidos($id) {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        $delete = $db->prepare("DELETE FROM pedidos WHERE id= :id ");

        $delete->bindParam(':id', $id, PDO::PARAM_INT);

        $delete->execute();

        if($delete->execute()) {
            echo "<script>alert('Se ha eliminado el registro.')</script>";
        }
    }
    public function allPedidos($empresa)
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        $select = $db->prepare("SELECT * FROM pedidos WHERE empresa = :empresa");
        $select->bindParam(':empresa', $empresa, PDO::PARAM_STR);
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

    public function pedidoByUserFecha($id_empresa)
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        //Obteber el nombre de la empresa del usuario
        $empresa = $db->prepare('SELECT * FROM members WHERE id_empresa = :id_empresa');
        $empresa ->execute(array('id_empresa' => $id_empresa));
        $data = $empresa->fetch(PDO::FETCH_ASSOC);
        $mData = array(
            'name' => $data['compania']
        );
        if($empresa != NULL) {
            $sql = "SELECT * FROM pedidos WHERE empresa = :empresa ORDER BY fecha DESC";
        } else {
            $sql = "SELECT * FROM pedidos ORDER BY fecha DESC";
        }
        $select = $db->prepare($sql);
        $select->bindParam(':empresa', $id_empresa, PDO::PARAM_STR);
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
        //$result = array($mData, $comp);
        return $mData;
    }

    public function pedidosByFecha($empresa)
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        if($empresa != NULL) {
            $sql = "SELECT * FROM pedidos WHERE empresa = :empresa ORDER BY fecha DESC";
        } else {
            $sql = "SELECT * FROM pedidos ORDER BY fecha DESC";
        }
        $select = $db->prepare($sql);
        $select->bindParam(':empresa', $empresa, PDO::PARAM_STR);
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

    public function allFechas()
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        $select = $db->prepare("SELECT * FROM pedidos");
        $select ->execute();
        $mData=array();
        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"]="Error de consulta de ejecución, porque: ". $db->errorInfo()[2];
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row['fecha'];
            }
        }
        return $mData;
    }

    public function totalPedidos()
    {
        $conexion = new conexionBD();
        $db = $conexion->conexion();
        $select = $db->prepare("SELECT id FROM pedidos");
        $select ->execute();
        $mData=array();
        //$total = '0';
        //$data = $select->fetch(PDO::FETCH_ASSOC);
        //$count = count($data['id']);
        //return count($data['id']);
        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            //$mData["error"]="Error de consulta de ejecución, porque: ". $db->errorInfo()[2];
            $mData = 0;
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row['id'];
                //$total = count($mData);
            }
        }
        return count($mData);;
        //while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
        //    $mData[] = $row['id'];
        //    $total = count($mData);
        //}
        //if($total > 0 ){
        //    return $total;
        //}
        //else{
        //    return false;
        //}
        
    }
}
?>