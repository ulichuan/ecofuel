<?php
$pedidos = new Pedido();
$producto = new Productos();
$cli_empresa = new Usuario();
//nhidden inputs
$dia_pedido = date('d-m-Y');
$hora_pedido = date('h:i:s');
$compa = $cli_empresa->getCliEmpresa($userId);
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
        <div class="row">
            <p class="form-group">Date: <input class="form-control" type="text" name="pedido_date" id="datepicker"></p>
        </div>
        
        <div class="row">
        <!-- datepicker -->
            
            <!-- dias -->
            <div class="col-4">
                <div class="form-group">
                    <label for="p_day">Selecciona el D&iacute;a</label>
                    <select class="form-control" name="p_day" id="p_day">
                        <!-- <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option> -->
                    </select>
                </div>
            </div>
            <!-- mes -->
            <div class="col-4">
                <div class="form-group">
                    <label for="p_month">Selecciona el Més</label>
                    <select class="form-control" name="p_month" id="dropDownYearMonth">

                    </select>
                    
                    <!-- <select class="form-control" name="ppp_month" id="p_month" >
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select> -->
                </div>
            </div>
            <!-- anio -->
            <div class="col-4">
                <div class="form-group" >
                    <label for="p_year">Selecciona el A&ntilde;o</label>
                    <select class="form-control" name="p_year" id="dropDownYear1">

                    </select>
                    <!-- <select class="form-control" name="ppp_year" id="p_year">
                        <option value="2021" selected><?php echo date('Y');?></option>
                        <!- <option name="next_year" id="next-year"></option> ->
                    </select> -->
                </div>
            </div>
        </div>
        <!-- .row fecha -->
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

        

        <div class="card-footer my-4
        ">
            <input class="btn btn-info col-md-4" type="submit" name="submit" value="Enviar">
        </div>
             
        
        </form>
    </div>

</div>
<!-- .card -->
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<script>
// Mostrar el dia actual
var diasMes = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
var fecha = new Date();
var hoy = fecha.getDate();
var currentYear = new Date().getFullYear();
var currentMonth = new Date().getMonth();
var cascadedDropDownMonthId = "#dropDownYearMonth";
var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    ];

//Adding current months on load
function loadMonths(curr) {
//dias
for (i = 0; i <= hoy; i++) {
    $('#p_day').append('<option selected value="' + (i + 1) + '">' + diasMes[i] + '</option>');
}
  //Months
  for (i = 0; i <= curr; i++) {
    $(cascadedDropDownMonthId).append('<option selected value="' + (i + 1) + '">' + monthNames[i] + '</option>');
  }
  //Adding Last 10 Years to Year Drop Down
  for (var i = currentYear; i < currentYear +3; i++) {
    $("#dropDownYear1").append('<option value="' + i.toString() + '">' + i.toString() + '</option>');
  }
}

//on change function
$('#p_day').on('click', function() {

  var currentSelectedValue = $(this).val();

  if (currentSelectedValue == "-1") {
    $(cascadedDropDownMonthId).prop("disabled", true);
  } else {
    $(cascadedDropDownMonthId).prop("disabled", false);
    //Get Current Year from Dropdown and Converting to Integer for performing math operations
    var currentSelectedYear = parseInt($(this).val());
    // Index the days
    
    //As Index of Javascript Month is from 0 to 11 therefore totalMonths are 11 NOT 12
    var totalMonths = 11;

    //Emptying the Month Dropdown to clear our last values
    $(cascadedDropDownMonthId).empty();

    // $(cascadedDropDownMonthId).append('<option value="-1">-Month-</option>');                                
    //Appending Current Valid Months
    if (currentSelectedYear == currentYear) {
      //Calling current month if year is current
      loadMonths(currentMonth)
      //total month
      totalMonths = currentMonth;
    } else {
      //If not current year load all months
      for (var month = 0; month <= totalMonths; month++) {
        $(cascadedDropDownMonthId).append('<option value="' + (month + 1) + '">' + monthNames[month] + '</option>');
      }
    }
  }
})

// execute the function when the page loads
$(document).ready(loadMonths(currentMonth));
</script>
<script>
 /*    // Mostrar el dia actual
    var diasMes = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
    var fecha = new Date();
    var hoy = fecha.getDate();
    console.log('->'+hoy)
    for (i = 0; i <= hoy; i++) {
        $('#p_day').append('<option selected value="' + (i + 1) + '">' + diasMes[i] + '</option>');
        console.log($('p_day').value);
    } */
    /* var days= document.getElementById('p_day');
    for (i = 0; i < days.options.length; i++) {
        if (days.options[i].value = hoy) {
            var num_dias = diasMes.indexOf(hoy);
            console.log(num_dias)
            days.options[num_dias].selected=true;
        }
    } */
    

</script>