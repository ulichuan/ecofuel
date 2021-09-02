<?php
$pedidos = new Pedido();
$cli = new Usuario();
$empresa = new Empresa();
//Todas las fechas de los pedidos
$fechis = $pedidos->allFechas();
//var_dump($fechis);
$null = NULL;
//Pedidos de cada empresa ordenados por fechas
$tt = $pedidos->pedidosByFecha($null);
//print_r($tt);
$pByf=array();
$pByc=array();
$pByd=array();
foreach ($tt as $k => &$fec) {
    $pByf[$fec['fecha']][$k] = $fec['producto'];
    $pByc[$fec['fecha']][$k] = $fec['cantidad'];
    $pByd[$fec['fecha']][$k] = $fec['dia_pedido'];
    $pBye[$fec['fecha']][$k] = $fec['empresa'];
}
$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
?>
<h1>Pedidos</h1>
    <?php
    //creamos la card
        foreach ($pByf as $k=>$item){
            //$dia = $dias[(date('N', strtotime($k))) - 1];
            $dia = $dias[(date('N', strtotime($k)))];
            ?>
            <div class="card card-primary collapsed-card">
                <div class="card-header">
            <?php
            echo "<h3 class=\"card-title\">".$k." <span class=\"dia_semana\">&nbsp;&nbsp;&nbsp; ".$dia."</span></h3>";
            ?>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                </div>
                </div><!-- card header -->
                <div class="card-body" style="display: none;">
                    <table class="table">
                        <tbody>
            <?php
            foreach($tt as $row){
                echo "<tr>";
                $comp = "$row[empresa]";
                $comp_name = $empresa->getEmpresaById($comp);
                $fech = "$row[fecha]";
                $prod = "$row[producto]";
                $cant = "$row[cantidad]";
                $dped = "$row[dia_pedido]";
                $hped = "$row[hora_pedido]";
                if($fech == $k){
                    //echo "<tr>";
                    echo "<td>".$comp_name."<td>";
                    echo "<td>".$prod."<td>";
                    echo "<td>".$cant."<td>";
                    echo "<td>".$dped."<td>";
                    echo "<td>".$hped."<td>";
                    //echo "<tr>";
                }
                echo "<tr>";
            }
            ?>
                    
                    </tbody>
                    </table>
                </div>
            </div>
            <?php
        }
        
    ?>

