<?php
//require '../clases/usuario.php';
$usuario = new Usuario;
$usuario->setName($usu_ario);
echo $usuario->getName();

if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
echo $id;

if(isset($_POST['editar'])){
    $u_id = $_POST['e_id'];
    $u_name = $_POST['e_name'];
    $u_email = $_POST['e_email'];
    $u_active = $_POST['e_active'];
    $u_permiso = $_POST['e_permiso'];

    if($u_permiso == 1){
        $u_descripcion = "Admin";
    }
    if($u_permiso == 2) {
        $u_descripcion = "Cliente";
    }
    $guardar = $usuario->updateUsuario($id,$u_name,$u_email,$u_active,$u_permiso,$u_descripcion);

}

$usuarioID = $usuario->usuarioById($id);
    foreach($usuarioID as $cli){
        $username = "$cli[username]";
        $useremail = "$cli[email]";
        $useractive = "$cli[active]";
        $userpermiso = "$cli[permiso]";
    }

?>
<h1>Editar Usuarios</h1>

<p>Hola <?php if(isset($usu_ario)){echo "Usuario: ".$usu_ario;} ?></p>



<!-- <a href="#" onclick="showForm('<?php //echo $usId; ?>);">Editar</a> -->

<form action="" method="post" id="editarUsuario">
    <input type="hidden" name="e_id" value="<?php echo $_GET["id"]; ?>">
    <p class="inputId"></p>
    <label for="e_name">Nombre
    <input type="text" name="e_name" id="e_name" value="<?php if(isset($username)) {echo $username;} ?>" placeholder="<?php $username; ?>">  
    </label> 
    <label for="e_email">Email
    <input type="text" name="e_email" id="e_email" value="<?php if(isset($useremail)) {echo $useremail;} ?>" placeholder="<?php $useremail; ?>">  
    </label>   
    <label for="e_active">¿Esta activo?
    <input type="text" name="e_active" id="e_active" value="<?php if(isset($useractive)) {echo $useractive;} ?>" placeholder="<?php $useractive; ?>">  
    </label>  
    <label for="e_permiso">
        <input type="radio" name="e_permiso" id="e_permiso1" value="1" <?php if($userpermiso == 1) {echo "checked";} ?>>Admin
        <input type="radio" name="e_permiso" id="e_permiso2" value="2" <?php if($userpermiso == 2) {echo "checked";} ?>>Cliente
    </label>    
    
    <input type="submit" name="editar" value="Editar">
</form>

