<?php
$empresa = new Empresa();
//Verifica si el formulario ha sido enviado correctamente
if(isset($_POST['submit'])){

    /* if (!isset($_POST['company'])) $error[] = "Por favor rellene el campo Nombre de la Empresa"; */
    if (!isset($_POST['username'])) $error[] = "Por favor rellene el usuario";
    if (!isset($_POST['email'])) $error[] = "Por favor rellene el Email";
    if (!isset($_POST['password'])) $error[] = "Por favor rellene la contrase$ntilde;a";
	// Permisos del usuario
	$permiso = $_POST['permiso'];
	// Descripcion del usuario
	if($permiso==1){
		$des = 'admin';
		$comp_e = "Ecofuel";
	}
	
	if($permiso==2){
		//Descripcion 
		$des = 'cliente';
		//La empresa
		$company = $_POST['company'];
		$e_company = $_POST['opt_company'];
		/* if(!isset($company) && !isset($e_company)){
			$error[] = 'Debe crear o elegir una empresa empresa para este usuario';
		} */
		//verificar que la empresa del select no este vacía
		$the_company = "";
		$the_e_company = "";
		if($e_company != "no"){
			$the_e_company = $e_company;
		} else {
			$the_e_company = "";
		}
		if(isset($company)) {
			$the_company = $company;
		} else {
			$the_company = "";
		}
		if($the_company == "" AND $the_e_company == ""){
			$error[] = 'Debe crear o elegir una empresa para este usuario';
		} 
		if(!empty($the_company) ) $comp_e = $the_company;
		if(!empty($the_e_company) ) $comp_e = $the_e_company;
	
	}
	
	// Nomnre del usuario
	$username = $_POST['username'];

	//very basic validation
	if(!$user->isValidUsername($username)){
		$error[] = 'Los nombres de usuario deben tener al menos 3 caracteres alfanuméricos';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $username));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = 'El nombre de usuario proporcionado ya está en uso.';
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'La contraseña es demasiado corta.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirmar contraseña es demasiado corta.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Las contraseñas no coinciden.';
	}

	//Validamos el correo electronico
	$email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Por favor, introduce una dirección de correo electrónico válida';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Este Email está ya siendo usado.';
		}

	}
	//Comprobamos que no exista error
	if(!isset($error)){
		//hash the password
		$hash_method = PASSWORD_BCRYPT;
		$hashedpassword = $user->password_hash($_POST['password'], $hash_method);

		//Creamos el codigo de activacion
		$activasion = md5(uniqid(rand(),true));

		$date = date('d-m-Y');
		//$fecha = $date->format(); 

		try {
			if($permiso==2)
			{
				//Registramos la empresa
				if($comp_e != $_POST['opt_company'])
				{
					$comp = $db->prepare('INSERT INTO empresas (company) VALUES (:the_company)');
					$comp->execute(array(
						':the_company'	=> $comp_e
					));
					$id_comp = $db->lastInsertId();
            	    // Continue
				}
				else
				{
					$n_comp = $empresa->empresaByName($comp_e);
					foreach($n_comp as $val){
						$id_comp = $val['id'];
					}
				}
			}
			if($permiso==1)
			{
				$id_comp = NULL;
				$comp_e = NULL;
			}
			//Insertar la informacion ingresada en el formulario de registro
			$stmt = $db->prepare('INSERT INTO members (username,password,email,activation_code,active,resetComplete,fechaAlta,permiso,descripcion,compania,id_empresa) VALUES (:username, :password, :email, :activation_code, :active, :resetComplete, :fechaAlta, :permiso, :descripcion, :the_company, :id_comp)');
			$stmt->execute(array(
				':username' => $username,
				':password' => $hashedpassword,
				':email' => $email,
				'activation_code' => $activasion,
				':active' => 'Yes',
				':resetComplete' => 'No',
				':fechaAlta' => $date,
				':permiso' => $permiso,
				':descripcion' => $des,
				':the_company'	=> $comp_e,
				':id_comp' 		=> $id_comp
			));
			//$u_id = $db->lastInsertId();
			
			
			/*
			//send email
			include "classes/phpmailer/mail-nuevo-registro.php";
			$to = $_POST['email'];
			$subject = $asunto;
			$body = $cuerpo;

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();
			*/
			//redireccionamos a lista de clientes
			//header('Location: login.php?action=joined');
            
			header('Location: '.DIR.'api/index.php?des=admin&page=lista_usuarios');
			exit;
			//header('Location: '.DIR.'api/index.php?des=admin&page=lista_usuarios');

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//definimos el titulo de la pagina
//$title = 'Login y registro PDO';
?>

<h1>Nuevo Usuario</h1>

<p>Hola <?php if(isset($usu_ario)){echo "Usuario: ".$usu_ario;} ?></p>

<form role="form" method="post" action="" autocomplete="off">
	<h2>Registrar Nuevo Usuario</h2>
	<!-- <p>¿Ya eres usuario? <a href='login.php'>Login</a></p> -->
	<hr>
	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="bg-danger">'.$error.'</p>';
		}
	}
	//if action is joined show sucess
	if(isset($_GET['action']) && $_GET['action'] == 'joined'){
		echo "<h4 class='bg-success'>Registro exitoso, este usuario puede acceder a la aplicaci&oacute;n.</h4>";
	}
	?>
	<div class="form-group">
		<p>Tipo de Registro</p>
		<input type="radio" name="permiso" value="1" >Administrador<br>
		<input type="radio" name="permiso" value="2" checked>Cliente<br>
	</div>
	<h3>Crea o Selecciona una Empresa para este Usuario</h3>
	<div class="form-group col-md-6">
		<label for="company">Crea una nueva empresa
		<input type="text" name="company" id="company" class="form-control input-lg" placeholder="Nombre Empresa" tabindex="1">
		</label>
	</div>
	<div class="form-group col-md-6">
		<label for="opt_company">Selecciona una Empresa
			<select name="opt_company" id="opt_company">
				<option value="no" selected>Seleccione Empresa</option>
				<?php 
				$lista_e = $empresa->allEmpresas();
				foreach($lista_e as $emp)
				{
					$n_empresa = "$emp[company]";
					echo "<option value=".$n_empresa.">".$n_empresa."</option>";
				}
				?>
			</select>
		</label>
	</div>
	<div class="form-group">
		<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Usuario" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="2">
	</div>
	<div class="form-group">
		<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" tabindex="3">
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="4">
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirmar Password" tabindex="5">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="6"></div>
	</div>
</form>