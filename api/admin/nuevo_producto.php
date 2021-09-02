<?php
$producto = new Productos();
if(isset($_POST['submit'])){
    if (!isset($_POST['name_p'])) $error[] = "Por favor rellene el campo Producto";
    $producto->newProduct();
}

?>
<h1>Servicios y Productos</h1>

<form id="new_product" role="form" method="post" autocomplete="off" >
    <?php
    //check for any errors
    if(isset($error)){
        foreach($error as $error){
            echo '<p class="bg-danger">'.$error.'</p>';
        }
    }
    ?>
    <div class="form-group">
		<label>Servicio o Producto
		<input type="text" name="producto" id="producto" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['producto'], ENT_QUOTES); } ?>">
        </label>
	</div>

    <div class="form-group">
		<label>Precio por Litro
		<input type="text" name="precio_litro" id="precio_litro" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['precio_litro'], ENT_QUOTES); } ?>">
        </label>
	</div>

    <div class="form-group">
		<label>Unidad
		<input type="text" name="unidad" id="unidad" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['unidad'], ENT_QUOTES); } ?>">
        </label>
	</div>

    <div class="form-group">
		<label>Precio Unidad
		<input type="text" name="precio_unidad" id="precio_unidad" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['precio_unidad'], ENT_QUOTES); } ?>">
        </label>
	</div>

    <div class="form-group">
        <label>Moneda
        <select name="moneda" id="moneda">
            <option value="euro"> Euro</option><!-- <i class="fas fa-euro-sign"></i>  -->
        </select>
        </label>
	</div>

    <div class="form-group">
		<label>Litros
		<input type="text" name="litros" id="litros" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['litros'], ENT_QUOTES); } ?>">
        </label>
	</div>

    <div class="form-group">
		<input type="submit" name="submit" id="submit" value="Guardar">
	</div>

</form>