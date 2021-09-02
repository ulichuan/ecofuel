<?php
$usuario = new Usuario;
$empresa = new Empresa;
$usuario->setName('Ulises');
//echo $usuario->getName();

if(isset($_POST["eliminar"])){
    $val_id = $_POST['delete_id'];
    $usuario->deleteUsuario($val_id);
}

?>

<div class="col">
    <h1 >Lista Usuarios</h1>
</div>

<div class="modal fade show" id="eliminar" style="display: none;" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">¿Desea Eliminar el Registro?</h4>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
          <span aria-hidden="true">×</span>-->
        </button>
      </div>
      <div class="modal-body">
          <form class="" action="" method="post" name="del" id="delete_user">
              <input type="hidden" id="delete_id" name="delete_id" value="">
              <div class="d-flex justify-content-around">
                  <input class="btn btn-secondary btn-sm w-50 p-2 m-1"type="button" id="no" onclick="showDiv();" value="No">   
                  <input class="btn btn-danger btn-sm w-50 p2 m-1" type="submit" name="eliminar" id="btn-delete" value="Si">
              </div>
          </form>
      </div>
      <div class="modal-footer justify-content-between">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- <div class="text-center" id="eliminar" style="display:none">
    
        <p>¿Desea Eliminar el Registro?</p>
        <form action="" method="post" name="del">
        <input type="hidden" id="delete_id" name="delete_id" value="">
        <input type="button" id="no" onclick="showDiv();" value="No">   
        <input type="submit" name="eliminar" id="btn-delete" value="Si">
        </form>
</div> -->


    <table class="table">
        <tbody>
            
        <?php 
            $allUsers = $usuario->allUsuarios();
            foreach ($allUsers as $us){
                echo "<tr>";
                $usCompa = '';
                $usID = "$us[id]";
                $usName = "$us[username]";
                $usMail = "$us[email]";
                $usDes = "$us[descripcion]";
                $usCompa = "$us[compania]";
                $emp_id = $empresa->getEmpresaIdByName($usCompa);
                if($usCompa != '' || $usCompa != NULL){
                  $lu_empresa = "<a href='#' onclick='varIdPage(\"admin\",\"editar_empresa\",$emp_id[0])';>".$usCompa."  <i class=\"far fa-edit\"></i></a>";
                } else {
                  //$usCompa = null;
                  $lu_empresa = '';
                }
                
                //var_dump($emp_id[0]);
                
                echo "<td>".$usID."</td>
                      <td>".$usName."</td>
                      <td>".$usMail."</td>
                      <td>".$lu_empresa."</td>
                      <td>".$usDes."</td>";
                ?>
                <!-- <a href="#" onclick="showForm('<?php //echo $usId; ?>);">Editar</a> -->
                <td><a href="#" onclick="varIdPage('admin','editar_usuarios', '<?php echo $usID; ?>');">Editar</a></td>
                <td><a href="#" class="btn-eliminar text-danger" id="<?php echo $usID; ?>" ><i class="fas fa-trash-alt"></i></a></td>
                
                <?php
                echo "<tr>";
            }
        ?>
            
        </tbody>

        </table>

<hr>
<p>Último Cliente por num Id</p>
<?php
    $usuarioID = $usuario->usuarioById($usID);
    foreach($usuarioID as $cli){
        echo "$cli[username]";
    }
?>

<script>
    // Show and hide the form tu delete item
    var btn = document.getElementsByClassName('btn-eliminar');
    var eleminar = document.getElementById('eliminar');

    for(let el of btn) {
      el.addEventListener("click", showDiv)
      
    }
    function showDiv() {
        
        //eliminar.innerHTML='Desea Eliminar?'; 
        if(eliminar.style.display === "block"){
            eliminar.style.display = "none";
        } else {
            eliminar.style.display = "block";
        }
    }

    // Put id value in input to delete item
    var del_id = document.getElementById('delete_id');
    var input_delete = document.getElementById('btn-delete');
    document.querySelectorAll(".btn-eliminar").forEach(el => {
      el.addEventListener("click", e => {
        const id = e.target.getAttribute("id");
        console.log("Se ha clickeado el id "+id);
        document.del.delete_id.value = id;
      });
    });
</script>
