<!DOCTYPE html>
<html>
  <head>
	
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <h1>Registrate</h1><hr>

	<?php
		include 'lib/usuarios.php';
		if ((empty($_POST['email']))&&
		(empty($_POST['pass']))&&
		(empty($_POST['pass2']))&&
		(empty($_POST['nombre']))&&
		(empty($_POST['apellidos']))){
	
	?>
	
  <form class="" action="registro.php" method="post">

	EMAIL<br><br><input type="text" name="email"  placeholder="Introduce tu email" required/><br><br>
	
	CONTRASEÑA<br><br><input type="password" name="pass" placeholder="Introduce tu contraseña" required/><br><br>

	REINSCRIBE TU CONSTRASEÑA<br><br><input type="password" name="pass2"  placeholder="Vuelve a introducir tu contraseña" required/><br><br>

	NOMBRE<br><br><input type="text" name="nombre" placeholder="Introduce tu nombre"  required/><br><br>

	APELLIDOS<br><br><input type="text" name="apellidos" placeholder="Introduce tu apellido" required/><br><br>
	
	<input type="submit" name="" value="ENVIAR">

	<?php
	}

	if((isset($_POST['email'])) && (!empty($_POST['email'])) &&
	(isset($_POST['pass'])) && (!empty($_POST['pass'])) &&
        (isset($_POST['pass2'])) && (!empty($_POST['pass2'])) &&
        (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) &&
        (isset($_POST['apellidos'])) && (!empty($_POST['apellidos']))) {
		
		
		$usuario = new usuario();
		$resultado=$usuario->mostrarUsuario($_POST['email']);
			
			if (($_POST['email'])==($resultado['email'])){
				echo "<font color='red'><h3>Este usuario ya existe, porfavor introduce otro.</h3></font><br><br>";
				?>
				<form class="" action="registro.php" method="post">

				EMAIL<br><br><input type="text" name="email"  placeholder="Introduce tu email" required/><br><br>
	
				CONTRASEÑA<br><br><input type="password" name="pass" placeholder="Introduce tu contraseña"  value="<?=$_POST['pass']?>" required/><br><br>

				REINSCRIBE TU CONSTRASEÑA<br><br><input type="password" name="pass2"  placeholder="Vuelve a introducir tu contraseña" value="<?=$_POST['pass2']?>" required/><br><br>

				NOMBRE<br><br><input type="text" name="nombre" placeholder="Introduce tu nombre" value="<?=$_POST['nombre']?>" required/><br><br>

				APELLIDOS<br><br><input type="text" name="apellidos" placeholder="Introduce tu apellido" value="<?=$_POST['apellidos']?>" required/><br><br>
	
				<input type="submit" name="" value="ENVIAR">
				<?php
				
			}else{
				if(($_POST['pass'])==($_POST['pass2'])) {
					echo "Las contraseñas coinciden.<br><br>";
					echo "Registrado correctamente<br><br>";
					echo "Logeate <a href=index.php>aquí!</a>";
					
					
					$registro = new usuario();
					$registro->insertarUser($_POST['email'],$_POST['nombre'],$_POST['apellidos'],$_POST['pass']);

				}else{
					echo "Hay un error, por favor realize otra vez el formulario<br><br>";
					echo "<a href=registro.php>Registrate</a>";
					return null;
				}
   			 }
		}
	?>




  </form>

</body>
</html>
