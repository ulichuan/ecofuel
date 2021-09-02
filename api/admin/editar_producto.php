<?php
$ed_producto = new Productos();
if(!isset($_GET['id'])) exit();
$edp_id = $_GET['id'];
//Datos del Form
if(isset($_POST['submit']))
{
    $edp_id = $_POST['edp_id'];
    $edp_name = $_POST['edp_name'];
    $edp_p_litro = $_POST['edp_p_litro'];
    $edp_unidad = $_POST['edp_unidad'];
    $edp_p_unidad = $_POST['edp_p_unidad'];
    $edp_moneda = $_POST['edp_moneda'];
    $edp_litros = $_POST['edp_litros'];

    $editar = $ed_producto->updateProduct($edp_id,$edp_name,$edp_p_litro,$edp_unidad,$edp_p_unidad,$edp_moneda,$edp_litros);
}

$produ_id = $ed_producto->productoById($edp_id);
foreach($produ_id as $row){
    $prod_name = "$row[producto]";
    $prod_plitro = "$row[precio_litro]";
    $prod_unidad = "$row[unidad]";
    $prod_pudidad = "$row[precio_unidad]";
    $prod_moneda = "$row[moneda]";
    $prod_litros = "$row[litros]";
}
?>
<h1>Editar Producto id:<?php echo $edp_id;?></h1>

<form action="" method="post" id="editarProducto">
<input type="hidden" name="edp_id" value="<?php echo $_GET["id"]; ?>">

<label class="col" for="edp_name">Producto
    <input type="text" name="edp_name" id="edp_name" value="<?php if(isset($prod_name )) {echo $prod_name ;} ?>" placeholder="<?php echo $prod_name ; ?>">  
</label> 

<label class="col" for="edp_name">Precio Litro
    <input type="text" name="edp_p_litro" id="edp_name" value="<?php if(isset($prod_plitro)) {echo $prod_plitro;} ?>" placeholder="<?php echo $prod_plitro; ?>">  
</label> 

<label class="col" for="edp_name">Unidad
    <input type="text" name="edp_unidad" id="edp_unidad" value="<?php if(isset($prod_unidad)) {echo $prod_unidad;} ?>" placeholder="<?php echo $prod_unidad; ?>">  
</label> 

<label class="col" for="edp_name">Precio Unidad
    <input type="text" name="edp_p_unidad" id="edp_p_unidad" value="<?php if(isset($prod_pudidad)) {echo $prod_pudidad;} ?>" placeholder="<?php echo $prod_pudidad; ?>">  
</label> 

<label class="col" for="edp_name">Moneda
    <input type="text" name="edp_moneda" id="edp_moneda" value="<?php if(isset($prod_moneda)) {echo $prod_moneda;} ?>" placeholder="<?php echo $prod_moneda; ?>">  
</label> 

<label class="col" for="edp_name">Litros
    <input type="text" name="edp_litros" id="edp_litros" value="<?php if(isset($prod_litros)) {echo $prod_litros;} ?>" placeholder="<?php echo $prod_litros; ?>">  
</label> 

<input type="submit" name="submit" value="Actualizar">
</form>