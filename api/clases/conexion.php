<?php
class conexionBD{
private $servidor = "localhost";
private $BD = "ecofuel";
private $tipo = "root";
private $pass = "cajanario";
private $conect;


public function conexion()
{
    /*Array con todo lo necesario para la configuración*/
    $arrOptions = array(
        PDO::ATTR_EMULATE_PREPARES => FALSE, 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    );

    $conectionString = "mysql:host=$this->servidor;dbname=$this->BD";
    try {
        $this ->conect = new PDO($conectionString,$this->tipo,$this->pass,$arrOptions);
        //$this->conect ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // var_dump($this->conect);
        // print_r($conexion);
        // $this ->conect ->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
        // $this ->conect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        return $this->conect;
        // return $conexion;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

}