<?php
class Empresa extends conexionBD
{
    public function newEmpresa()
    {
        //if(isset($_REQUEST['']))
        //{
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        //From Inputs
        $company=$_POST['e_name'];
        $nombre_fiscal=$_POST['e_name_f'];
        $number_fiscal=$_POST['e_number_f'];
        $e_email=$_POST['e_email'];
        $phone_number=$_POST['e_phone_number'];
        $mobile_number=$_POST['e_mobile_number'];
        $address_1=$_POST['e_address1'];
        $address_2=$_POST['e_address2'];
        $postal=$_POST['e_postal'];
        $city=$_POST['e_city'];
        $estate=$_POST['e_estate'];
        $person_1=$_POST['e_person1'];
        $mobile_P1=$_POST['e_mobile_p1'];
        $person_2=$_POST['e_person2'];
        $mobile_P2=$_POST['e_mobile_p2'];
        $category=$_POST['e_category'];
        if(empty($company)){
            $company = NULL;
        }
        if(empty($nombre_fiscal)){
            $nombre_fiscal = NULL;
        }
        if(empty($number_fiscal)){
            $number_fiscal = NULL;
        }
        if(empty($e_email)){
            $e_email = NULL;
        }
        if(empty($phone_number)){
            $phone_number = NULL;
        }
        if(empty($mobile_number)){
            $mobile_number = NULL;
        }
        if(empty($address_1)){
            $address_1 = NULL;
        }
        if(empty($address_2)){
            $address_2 = NULL;
        }
        if(empty($postal)){
            $postal = NULL;
        }
        if(empty($city)){
            $city = NULL;
        }
        if(empty($estate)){
            $estate = NULL;
        }
        if(empty($person_1)){
            $person_1 = NULL;
        }
        if(empty($mobile_P1)){
            $mobile_P1 = NULL;
        }
        if(empty($person_2)){
            $person_2 = NULL;
        }
        if(empty($mobile_P2)){
            $mobile_P2 = NULL;
        }
        if(empty($category)){
            $category = NULL;
        }
        // Dardo like null
        $dardo = 0;
        // Upload image
        /* if(!empty($_FILES["e_image"]["name"])){
            $image_file = $_FILES["e_image"]["name"];
            $type = $_FILES["e_image"]["type"];
            $size = $_FILES["e_image"]["size"];
            $temp = $_FILES["e_image"]["tmp_name"];
            //Path to image file
            $path=DIR."upload/images/".$image_file;
            // Controls
            if($type =="image/jpg" || $type=="image/jpeg" || $type=="image/png" || $type=="image/gif") // we check the file extension
            {
                if(!file_exists($path)) //check file not exist
                {
                    if($size < 1500000) // file size 5MB
                    {
                        move_uploaded_file($temp, DIR."upload/images/".$image_file); //move from temporary directory to our upload folder
                    }
                    else{
                        $errorMsg="La imagen no puede ser superior a 5MB"; // error message file is over 5mb
                        return $errorMsg;
                    }
                }
                else{
                    $errorMsg="La imagen ya existe."; // error message file exist in upload/images folder
                    return $errorMsg;
                }
            }
            else 
            {
                $errorMsg="Formato no permitido. Solo jpg, jpeg, png y gif"; // error message for image format
                return $errorMsg;
            }
        } 
        else
        {
            $image_file = NULL;
        } */
        $image_file = NULL;
        try
            {
                // Insert Query
                $insert=$con->prepare('INSERT INTO empresas(
                    company,nombre_fiscal,numero_fiscal,email,phone_number,mobile_number,address_1,address_2,postal_code,city,estate,image_file,person_1,mobile_person1,person_2,mobile_person2,category,dardo_e) VALUES(:company,:nombre_fiscal,:number_fiscal,:e_email,:phone_number,:mobile_number,:address_1,:address_2,:postal,:city,:estate,:image_file,:person_1,:mobile_P1,:person_2,:mobile_P2,:category,:dardo)');
                $insert->bindParam(':company',$company, PDO::PARAM_STR);
                $insert->bindParam(':nombre_fiscal',$nombre_fiscal, PDO::PARAM_STR);
                $insert->bindParam(':number_fiscal',$number_fiscal, PDO::PARAM_STR);
                $insert->bindParam(':e_email',$e_email, PDO::PARAM_STR);
                $insert->bindParam(':phone_number',$phone_number, PDO::PARAM_STR);
                $insert->bindParam(':mobile_number',$mobile_number, PDO::PARAM_STR);
                $insert->bindParam(':address_1',$address_1, PDO::PARAM_STR);
                $insert->bindParam(':address_2',$address_2, PDO::PARAM_STR);
                $insert->bindParam(':postal',$postal, PDO::PARAM_STR);
                $insert->bindParam(':city',$city, PDO::PARAM_STR);
                $insert->bindParam(':estate',$estate, PDO::PARAM_STR);
                $insert->bindParam(':image_file',$image_file, PDO::PARAM_STR);
                $insert->bindParam(':person_1',$person_1, PDO::PARAM_STR);
                $insert->bindParam(':mobile_P1',$mobile_P1, PDO::PARAM_STR);
                $insert->bindParam(':person_2',$person_2, PDO::PARAM_STR);
                $insert->bindParam(':mobile_P2',$mobile_P2, PDO::PARAM_STR);
                $insert->bindParam(':category',$category, PDO::PARAM_STR);
                $insert->bindParam(':dardo',$sardo, PDO::PARAM_INT);
                //$insert->bindParam(':dardo',$dardo, PDO::PARAM_INT);
                $insert->execute();
                $ultimoId = $con->lastInsertId();
                // Continue
                //$registro = $insert->rowCount();
                if($ultimoId)
                {
                    $theId = $ultimoId;
                    $the_Id = $theId;
                    $sql="UPDATE empresas SET dardo_e = :the_Id WHERE id = :theId";
                    $update = $con->prepare($sql);
                    $update->bindParam(':the_Id',$the_Id, PDO::PARAM_INT);
                    $update->bindParam(':theId',$theId, PDO::PARAM_INT);
                    //$update->execute();
                    if($update->execute())
                    {
                        $count = $update -> rowCount();
                        echo "<div class='content alert alert-primary' >
                        Gracias: $count registro creado con exito</div>";
                    }
                    else
                    {
                        $errorMsg="<div class='content alert alert-danger'> Error en registro 'dardo'</div>";
                        return $errorMsg;
                        print_r("---->".$update->errorInfo()); 
                    }
                } else {
                    $errorMsg="<div class='alert-danger'>Ha havido un error con el envio de los datos</div>";
                    return $errorMsg;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
    }

    public function updateEmpresa()
    {
        //if(isset($_REQUEST['']))
        //{
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        //From Inputs
        $empresa_id = $_POST['id_comp'];
        $dardo_id = $empresa_id;
        $company=$_POST['e_name'];
        $nombre_fiscal=$_POST['e_name_f'];
        $number_fiscal=$_POST['e_number_f'];
        $e_email=$_POST['e_email'];
        $phone_number=$_POST['e_phone_number'];
        $mobile_number=$_POST['e_mobile_number'];
        $address_1=$_POST['e_address1'];
        $address_2=$_POST['e_address2'];
        $postal=$_POST['e_postal'];
        $city=$_POST['e_city'];
        $estate=$_POST['e_estate'];
        $person_1=$_POST['e_person1'];
        $mobile_P1=$_POST['e_mobile_p1'];
        $person_2=$_POST['e_person2'];
        $mobile_P2=$_POST['e_mobile_p2'];
        $category=$_POST['e_category'];
        if(empty($company)){
            $company = NULL;
        }
        if(empty($nombre_fiscal)){
            $nombre_fiscal = NULL;
        }
        if(empty($number_fiscal)){
            $number_fiscal = NULL;
        }
        if(empty($e_email)){
            $e_email = NULL;
        }
        if(empty($phone_number)){
            $phone_number = NULL;
        }
        if(empty($mobile_number)){
            $mobile_number = NULL;
        }
        if(empty($address_1)){
            $address_1 = NULL;
        }
        if(empty($address_2)){
            $address_2 = NULL;
        }
        if(empty($postal)){
            $postal = NULL;
        }
        if(empty($city)){
            $city = NULL;
        }
        if(empty($estate)){
            $estate = NULL;
        }
        if(empty($person_1)){
            $person_1 = NULL;
        }
        if(empty($mobile_P1)){
            $mobile_P1 = NULL;
        }
        if(empty($person_2)){
            $person_2 = NULL;
        }
        if(empty($mobile_P2)){
            $mobile_P2 = NULL;
        }
        if(empty($category)){
            $category = NULL;
        }
    
        $image_file = NULL;
        try
            {
                // Insert Query
                $update=$con->prepare('UPDATE empresas SET
                    company = :company, nombre_fiscal = :nombre_fiscal, numero_fiscal = :number_fiscal, email = :e_email, phone_number = :phone_number, mobile_number = :mobile_number, 
                    address_1 = :address_1, address_2 = :address_2, postal_code = :postal, city = :city, estate = :estate, image_file = :image_file, person_1 = :person_1, mobile_person1 = :mobile_P1, 
                    person_2 = :person_2, mobile_person2 = :mobile_P2, category = :category, dardo_e = :dardo_id  WHERE id = :empresa_id');
                $update->bindParam(':empresa_id',$empresa_id, PDO::PARAM_INT);
                $update->bindParam(':company',$company, PDO::PARAM_STR);
                $update->bindParam(':nombre_fiscal',$nombre_fiscal, PDO::PARAM_STR);
                $update->bindParam(':number_fiscal',$number_fiscal, PDO::PARAM_STR);
                $update->bindParam(':e_email',$e_email, PDO::PARAM_STR);
                $update->bindParam(':phone_number',$phone_number, PDO::PARAM_STR);
                $update->bindParam(':mobile_number',$mobile_number, PDO::PARAM_STR);
                $update->bindParam(':address_1',$address_1, PDO::PARAM_STR);
                $update->bindParam(':address_2',$address_2, PDO::PARAM_STR);
                $update->bindParam(':postal',$postal, PDO::PARAM_STR);
                $update->bindParam(':city',$city, PDO::PARAM_STR);
                $update->bindParam(':estate',$estate, PDO::PARAM_STR);
                $update->bindParam(':image_file',$image_file, PDO::PARAM_STR);
                $update->bindParam(':person_1',$person_1, PDO::PARAM_STR);
                $update->bindParam(':mobile_P1',$mobile_P1, PDO::PARAM_STR);
                $update->bindParam(':person_2',$person_2, PDO::PARAM_STR);
                $update->bindParam(':mobile_P2',$mobile_P2, PDO::PARAM_STR);
                $update->bindParam(':category',$category, PDO::PARAM_STR);
                $update->bindParam(':dardo_id',$dardo_id, PDO::PARAM_INT);
                $update->execute();
                // Continue
                if($update->execute())
                {
                    if(!empty($company))
                    {
                        $usr = new Usuario();
                        //$count = $update -> rowCount();
                        $lista = $usr->allUsuariosByEmpresa($empresa_id);
                        foreach($lista as $member){
                            //$comp = "$member[id_empresa]";
                            $cli = "$member[username]";
                            //actualizar a los usuarios de esta empresa
                            $update1 = $con->prepare('UPDATE members SET compania= :company WHERE id_empresa=:empresa_id');
                            $update1->bindParam(':empresa_id',$empresa_id, PDO::PARAM_INT);
                            $update1->bindParam(':company',$company, PDO::PARAM_STR);
                            $update1->execute();
                        }
                        echo "<div class='content alert alert-primary' >
                        Gracias: actualizacion exitosa de</div>";
                    }
                    //echo "<div class='content alert alert-primary' >
                    //Gracias: registro creado con exito</div>";
                    
                }
                else
                {
                    $errorMsg="<div class='content alert alert-danger'> Error en registro</div>";
                    return $errorMsg;
                    print_r($update->errorInfo()); 
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
    }

    public function allEmpresas()
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM empresas");
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

    public function empresaById($id)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM empresas WHERE id=:id");
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

    public function getEmpresaById($id)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM empresas WHERE id=:id");
        $select ->execute(array('id' => $id));
        $data = $select->fetch(PDO::FETCH_ASSOC);
        return $data['company'];
    }

    public function compNameById($id)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM empresas WHERE id=:id");
        $select ->execute(array('id' => $id));
        $data = $select->fetch(PDO::FETCH_ASSOC);
        return $data['company'];
    }
    public function empresaByName($name)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM empresas WHERE company=:name");
        $select ->execute(array('name' => $name));
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

    public function getIdByNameEmpresa($name)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM empresas WHERE company=:name");
        $select ->execute(array('name' => $name));
        $data = $select->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

    public function getJasonByID() {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $id = $_GET['getJasonByID'];
        $select = $con->prepare("SELECT * FROM empresas WHERE id=:id");
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
        return json_encode($mData);
    }

    public function getEmpresaIdByName($company)
    {
        $conexion = new conexionBD();
        $con = $conexion->conexion();
        $select = $con->prepare("SELECT * FROM empresas WHERE company=:company");
        $select ->execute(array('company' => $company));
        $mData=array();
        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"]="Error de consulta de ejecución, porque: ". $con->errorInfo()[2];
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row['id'];
            }
        }
        return $mData;
        // devuelve array, ejem:: $emp_id = $empresa->getEmpresaIdByName($usCompa); => $emp_id[0]
    }

}
