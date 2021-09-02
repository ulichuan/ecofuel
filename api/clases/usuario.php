<?php
class Usuario extends conexionBD
{
    public $id;
    public $username;
    public $email;
    public $activation_code;
    public $active;
    public $resetToken;
    public $resetComplete;
    public $fechaAlta;
    public $fechaBaja;
    public $permiso;
    public $descripcion;

    public function allUsuarios()
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM members");
        $select ->execute();
        $mData=array();
        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"]="Error de consulta de ejecución, porque: ". $con->errorInfo()[2];
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row;
            }
        }
        return $mData;
    }

    public function usuarioById($id)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM members WHERE id=:id");
        $select ->execute(array('id' => $id));
        $mData=array();
        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"]="Error de consulta de ejecución, porque: ". $con->errorInfo()[2];
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row;
            }
        }
        return $mData;
    }

    public function updateUsuario($id,$username,$email,$active,$permiso,$descripcion)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $update = $con->prepare("UPDATE members SET username=:username, email=:email, active=:active, permiso=:permiso, descripcion=:descripcion WHERE id= :id ");
        
        $update->bindParam(':id',$id,PDO::PARAM_INT);
        $update->bindParam(':username',$username,PDO::PARAM_STR, 25);
        $update->bindParam(':email',$email,PDO::PARAM_STR, 25);
        $update->bindParam(':active',$active,PDO::PARAM_STR, 25);
        $update->bindParam(':permiso',$permiso,PDO::PARAM_INT);
        $update->bindParam(':descripcion',$descripcion,PDO::PARAM_STR, 25);

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

    public function getCliEmpresa($id)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM members WHERE id=:id");
        $select ->execute(array('id' => $id));
        $data = $select->fetch(PDO::FETCH_ASSOC);
        return $data['compania'];
    }
    
    public function getIdEmpresaByUser($id)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM members WHERE id=:id");
        $select ->execute(array('id' => $id));
        $data = $select->fetch(PDO::FETCH_ASSOC);
        return $data['id_empresa'];
    }

    public function deleteUsuario($id)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $delete = $con->prepare("DELETE FROM members WHERE id= :id ");

        $delete->bindParam(':id', $id, PDO::PARAM_INT);

        $delete->execute();

        if($delete->execute()) {
            echo "<script>alert('Se ha eliminado el registro.')</script>";
        }
    }

    public function allUsuariosByEmpresa($val)
    {
        $conexion = new conexionBD;
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM members WHERE id_empresa=:val");
        $select ->execute(array('val' => $val));
        $mData=array();
        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"]="Error de consulta de ejecución, porque: ". $con->errorInfo()[2];
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row;
            }
        }
        return $mData;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->username = $id;
    }

    public function getName()
    {
        return $this->username;
    }
    public function setName($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getActivationCode()
    {
        return $this->activation_code;
    }
    public function setActivationCode($activation_code)
    {
        $this->email = $activation_code;
    }

    public function getActive()
    {
        return $this->active;
    }
    public function setActive($active)
    {
        $this->email = $active;
    }

    public function getResetToken()
    {
        return $this->resetToken;
    }
    public function setResetToken($resetToken)
    {
        $this->email = $resetToken;
    }

    public function getResetComplete()
    {
        return $this->resetComplete;
    }
    public function setResetComplete($resetComplete)
    {
        $this->email = $resetComplete;
    }

    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }
    public function setFechaAlta($fechaAlta)
    {
        $this->email = $fechaAlta;
    }

    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }
    public function setFechaBaja($fechaBaja)
    {
        $this->email = $fechaBaja;
    }

    public function getPermiso()
    {
        return $this->permiso;
    }
    public function setPermiso($permiso)
    {
        $this->email = $permiso;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->email = $descripcion;
    }


}