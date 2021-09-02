<?php
//require '../clases/usuario.php';
$usuario = new Usuario;
$usuario->setName($usu_ario);
//echo $usuario->getName();

$id = $userId;

if(isset($_POST['editar'])){
    $u_id = $_POST['e_id'];
    $u_name = $_POST['e_name'];
    $u_email = $_POST['e_email'];
    $u_active = $_POST['e_active'];
    $u_compania = $_POST['e_compania'];

    
    $guardar = $usuario->updateUsuario($id,$u_name,$u_email,$u_active,$u_permiso,$u_descripcion);

}

$usuarioID = $usuario->usuarioById($id);
    foreach($usuarioID as $cli){
        $username = "$cli[username]";
        $useremail = "$cli[email]";
        $useractive = "$cli[active]";
        $usercompania = "$cli[compania]";
        $userpermiso = "$cli[permiso]";
        $userdescripcion = "$cli[descripcion]";
    }

?>
<h1>Editar Usuario</h1>

<p>Hola <?php if(isset($usu_ario)){echo $usu_ario;} ?></p>



<!-- <a href="#" onclick="showForm('<?php //echo $usId; ?>);">Editar</a> -->
<div class="card">
    
    <form action="" method="post" id="editarUsuario">
        <div class="car-body">
            <input type="hidden" name="e_id" value="<?php echo $id; ?>">
            <input type="hidden" name="e_descripcion" value="<?php echo $userdescripcion; ?>">
            <input type="hidden" name="e_permiso" value="<?php echo $userpermiso; ?>">
            <div class="form-group">
            <label class="gray-strong my-2" for="e_name">Nombre</label> 
            <input class="form-control"  type="text" name="e_name" id="e_name" value="<?php if(isset($username)) {echo $username;} ?>" placeholder="<?php $username; ?>">  
            </div>
            <div class="form-group">
            <label class="gray-strong my-2" for="e_email">Email</label> 
            <input class="form-control"  type="text" name="e_email" id="e_email" value="<?php if(isset($useremail)) {echo $useremail;} ?>" placeholder="<?php $useremail; ?>">  
            </div>
            <div class="form-group">
            <label class="gray-strong my-2" for="e_compania">Empresa</label> 
            <input class="form-control" type="text" name="e_compania" id="e_compania" value="<?php if(isset($usercompania)) {echo $usercompania;} ?>" placeholder="<?php $usercompania; ?>">  
            </div>
            <div class="form-group">
            <label class="gray-strong my-2" for="e_permiso">¿Permanecer activo?</label> 
                <input type="radio" name="e_active" id="e_active1" value="Yes" <?php if($useractive == "Yes") {echo "checked";} ?>>Si
                <input type="radio" name="e_active" id="e_active2" value="No" <?php if($useractive == "No") {echo "checked";} ?>>No
            </div>
        </div>
        <div class="card-footer">
            <input class="btn btn-success col-md-4" type="submit" name="editar" value="Guardar Cambios">
        </div>    
    </form>

</div>

