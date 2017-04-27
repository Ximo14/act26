<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
	
	<h1>INICIO</h1><hr>
	<?php
		
	if((empty($_POST['usuario'])) &&
	(empty($_POST['pass']))) {
			?>
	  
	<form class="" action="index.php" method="post">
			USUARIO<br><br><input type="text" name="usuario"  placeholder="Escribe tu nombre de usuario" required/><br><br>
			
			CONTRASEÑA<br><br><input type="password" name="pass" placeholder="Escribe tu contraseña" required/><br><br>
			
			<input type="submit" name="" value="ENTRAR" required/><br><br>
			
			<a href="registro.php">Registrarse</a>
			
	
	</form>
	
	<?php
	}
		if ((isset($_POST['usuario'])) && (!empty($_POST['usuario'])) &&
		(isset($_POST['pass'])) && (!empty($_POST['pass']))){
			
				include 'lib/usuarios.php';
				include 'lib/seguridad.php';
				$login = new usuario();
				$seguridad = new seguridad();
				$resultado=$login->login($_POST['usuario']);
					
					if ($resultado['usuario']==$_POST['usuario']){
						echo "Usuario encontrado<br>";
						if ((sha1($_POST['pass'])==($resultado['pass']))){
							echo "Logeado correctamente.<br><br>";
							$seguridad->addUsuario($resultado['usuario']);
							echo "Inicia sesion en tu <a href=MiPerfil.php?email=".$resultado['email'].">perfil</a>";
							
							}else{
							echo "Las contraseñas no coinciden, vuelve a <a href=index.php>logearte</a><br><br>";
							}
						}else {
							echo "Si no tienes cuenta, registrate aquí <a href=registro.php>REGISTRO</a><br><br>";
							}
						}
		?>
</body>
</html>
