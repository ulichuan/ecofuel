<?php
require 'includes/conf.php';

//Verifica el formulario
if(isset($_POST['submit'])){

	if (!isset($_POST['username'])) $error[] = "Por favor rellene el usuario";
	if (!isset($_POST['password'])) $error[] = "Por favor rellene la contraseña";

	$username = $_POST['username'];
	if ( $user->isValidUsername($username)){
		if (!isset($_POST['password'])){
			$error[] = 'Se debe ingresar una contraseña';
		}
		$password = $_POST['password'];

		/*if($user->login($username,$password) ){
			$_SESSION['username'] = $username;
			header('Location: ../masters.php');
			exit;
		*/
		if($user->login($username,$password) ){
            //session_start();
			$usuario = $_SESSION["user_name"];
			$tipo = $_SESSION["permiso"];
			$userId = $_SESSION["memberID"];
            $permiso = $_SESSION["permiso"];
            $descripcion = $_SESSION["descripcion"];

            header("Location: ".DIR."api/index.php");
            
		}else {
			$error[] = 'Nombre de usuario o contraseña incorrectos o su cuenta no ha sido activada.';
		}
	}else{
		$error[] = 'Los nombres de usuario deben ser alfanuméricos y tener entre 3 y 16 caracteres de longitud.';
	}

}//end if submit


//define page title
$title = 'Login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo SITETITLE;?></title>
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo DIR; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo DIR; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo DIR; ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo DIR; ?>dist/css/custom.css">
  <link rel="stylesheet" href="<?php echo DIR; ?>plugins/jquery-ui/jquery-ui.css">
<!-- jQuery -->
<script src="<?php echo DIR; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo DIR; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<div class="row justify-content-center">
	<div class="col-auto p-5">
	<div class="card">
		<form role="form" method="post" action="" autocomplete="off">
			<h2>Iniciar sesion</h2>
			<p><a href='../index.html'>Retornar al inicio</a></p>
			<hr>
			<?php
			//check for any errors
			if(isset($error)){
				foreach($error as $error){
					echo '<p class="bg-danger">'.$error.'</p>';
				}
			}
			if(isset($_GET['action'])){
				//check the action
				switch ($_GET['action']) {
					case 'active':
						echo "<h2 class='bg-success'>Su cuenta ya está activa, ahora puede iniciar sesión.</h2>";
						break;
					case 'reset':
						echo "<h2 class='bg-success'>Por favor revise su bandeja de entrada para un enlace de restablecimiento.</h2>";
						break;
					case 'resetAccount':
						echo "<h2 class='bg-success'>Contraseña cambiada, ahora puede iniciar sesión.</h2>";
						break;
				}
			}

			?>
			<div class="form-group">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Usuario" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1" autofocus >
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
			</div>

			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9">
					 <a href='reset.php'>Recuperar contraseña?</a>
				</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" name="submit" value="Iniciar Sesion" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
			</div>
		</form>
	</div>
	</div><!-- .col -->
</div>
