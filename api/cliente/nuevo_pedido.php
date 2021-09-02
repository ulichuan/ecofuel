<?php
$pedidos = new Pedido();
$producto = new Productos();
$cli_empresa = new Usuario();
//nhidden inputs
$dia_pedido = date('d-m-Y');
$hora_pedido = date('h:i:s');
$compa = $cli_empresa->getIdEmpresaByUser($userId);
echo "->".$compa;
//Enviar los datos del form
if(isset($_POST['submit'])){
    $pedidos->newPedido();
}
?>
<h1>Hacer Pedido Nuevo de Recogida</h1>

<div class="card card-info">
    <div class="card-header">
        <h3>Realiza un nuevo pedido</h3>
    </div>
    <div class="card-body">
        <form id="new_order" action="" method="post">
            <input type="hidden" name="empresa" value="<?php echo $compa; ?>">
            <input type="hidden" name="usuario" value="<?php echo $userId; ?>">
            <input type="hidden" name="d_pedido" value="<?php echo $dia_pedido; ?>">
            <input type="hidden" name="h_pedido" value="<?php echo $hora_pedido; ?>">
        <div class="form-group">
	    	<p>Seleccione los productos a recoger</p>
                <?php
                $prod_check = $producto->allProducts();
                foreach($prod_check as $check){
                    $prods = "$check[producto]";
                    echo "<div class=\"form-check\">";
                    echo "<input type=\"checkbox\" name=\"products\" value=\"".$prods."\"> ";
                    echo "<label class=\"form-check-label\" for=\"products\">".$prods."</label>";
                    echo "</div>";
                }
                ?>
            </label>
	    </div>
        <!-- <div class="row">
            <p class="form-group">Date: <input class="form-control" type="text" name="pedido_date" id="datepicker"></p>
        </div> -->
        
        <div class="row">
            <label for="indate" class="gray-strong my-2">Elige un d&iacute;a para la cita</label>
            <input type="date" name="indate" id="indate">
        </div><!-- date -->   
        
        <hr>
        <!-- Cantidades -->
        <div class="row">
            <div class="col-12">
                <h4>Seleccione Unidades o Litros</h4>
            </div>
            <!-- unidades-->
            <div class="col-6">
                <div class="form-group">
                    <label for="p_unidades">Unidades a recoger</label>
                    <select class="form-control" name="p_unidades" id="p_unidades">
                        <option value="">Unidades</option>
                        <option value="1">1 unidad</option>
                        <option value="2">2 unidades</option>
                        <option value="3">3 unidades</option>
                        <option value="4">4 unidades</option>
                        <option value="5">5 unidades</option>
                        <option value="6">6 unidades</option>
                        <option value="7">7 unidades</option>
                        <option value="8">8 unidades</option>
                        <option value="9">9 unidades</option>
                        <option value="10">10 unidades</option>
                    </select>
                </div>
            </div>
            <!-- unidades-->
            <div class="col-6">
                <div class="form-group">
                    <label for="p_litros">Litros a recoger</label>
                    <select class="form-control" name="p_litros" id="p_litros">
                        <option value="">Litros</option>
                        <option value="1">1 </option>
                        <option value="2">2 litros</option>
                        <option value="3">3 litros</option>
                        <option value="4">4 litros</option>
                        <option value="5">5 litros</option>
                        <option value="10">10 litros</option>
                        <option value="15">15 litros</option>
                        <option value="20">20 litros</option>
                        <option value="25">25 litros</option>
                        <option value="30">30 litros</option>
                    </select>
                </div>
            </div>
        </div> 
        <!-- .row cantidades -->  

        

        <div class="card-footer my-4">
            <input class="btn btn-info col-md-4" type="submit" name="submit" value="Enviar">
        </div>
             
        
        </form>
    </div>

</div>
<!-- .card -->
<script>
  $( function() {
      var datepicker = $('#datepicker');
    $( "#datepicker" ).datepicker();
    $.datepicker.setDefaults({
      showOn: "both",
      buttonImageOnly: true,
      buttonImage: "calendar.gif",
      buttonText: "Calendar"
    });
  } );
  </script>
<script>
      const picker = document.getElementById('indate');
      picker.addEventListener('input', function(e){
        var day = new Date(this.value).getUTCDay();
        if([6,0].includes(day)){
          e.preventDefault();
          this.value = '';
          alert('Fin de semana no disponible');
        }
      });
    </script>