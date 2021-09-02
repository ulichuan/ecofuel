<?php
$pedidos = new Pedido();
$cli = new Usuario();
$empr_id = $cli->getIdEmpresaByUser($userId);
$fechis = $pedidos->allFechas();
//$tt = $pedidos->pedidosByFecha($empr_id);
$tt = $pedidos->pedidoByUserFecha($empr_id);
echo $empr_id."<br>";
print_r($tt);
$pByf=array();
$pByc=array();
$pByd=array();
foreach ($tt as $k => &$fec) {
    //$pByc[$fec['fecha']][$k]= $fec['cantidad'];//=$k['id'];
    print_r( $pByf[$fec['fecha']][$k] = $fec['dia_pedido']);
    //$pByf[$dat[$fec['fecha']]][$k] = $fec['producto'];
    //$pByf[$fec[0]['fecha']][$k] = $fec['producto'];
    //$pByc[$fec['fecha']][$k] = $fec['cantidad'];
    //$pByd[$fec['fecha']][$k] = $fec['dia_pedido'];
    
}

//print_r($pByf);
//print_r($pByc);
//print_r($pByd);
?>
<h1>Pedidos</h1>    
        <?php
        //creamos la card
        foreach ($pByf as $k=>$item){
            ?>
            <div class="card card-primary collapsed-card">
                <div class="card-header">
                    
            <?php
            echo "<h3 class=\"card-title\">".$k."</h3>";
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
                $fech = "$row[fecha]";
                $prod = "$row[producto]";
                $cant = "$row[cantidad]";
                $dped = "$row[dia_pedido]";
                $hped = "$row[hora_pedido]";
                if($fech == $k){
                    //echo "<tr>";
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
        
        
    
