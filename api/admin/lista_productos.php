<?php
$producto = new Productos();

?>
<h1>Lista de los Productos</h1>
<div class="row">
    <button class="btn btn-success" id="lp_new_product" onclick="irProducto();"><i class="fas fa-plus"></i> Producto</button>
</div>

<table class="table">
    <tbody>
        <?php 
        $listar = $producto->allProducts();
        foreach($listar as $row)
        {
            $lp_id = "$row[id]";
            $nombre = "$row[producto]";
            $p_litro = "$row[precio_litro]";
            $unidad = "$row[unidad]";
            $p_unidad = "$row[precio_unidad]";
            $moneda = "$row[moneda]";
            $euro = '';
            if($moneda == "euro") $euro = "<i class=\"fas fa-euro-sign\"></i>";
            echo "<tr>";
            echo "<td>".$nombre."</td>";
            echo "<td>Precio Litro: ".$p_litro." ".$euro."</td>";
            echo "<td>Unidades: ".$unidad."</td>";
            echo "<td>Precio Unidad: ".$p_unidad." ".$euro."</td>";
            echo "<td><a href='#' onclick='varIdPage(\"admin\",\"editar_producto\",$lp_id )';><i class=\"far fa-edit\"></i></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<script>
    function irProducto(){
    var url = "<?php echo DIR; ?>";
    window.location.href = url+"api/index.php?des=admin&page=nuevo_producto";
    };
</script>