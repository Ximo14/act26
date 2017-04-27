<?php
include 'db.php';
/**
 *
 */
class usuario extends db
{

  function __construct()
  {
    //Realizamos la conexion a la base de datos mediante db.
    parent::__construct();

  }


  //Funciones para la inserccion
  public function insertarUser($email,$nombre,$apellidos,$pass){

    if ($this->hayError()==true){
        return null;

    }else{

      $sqlInserction="INSERT INTO usuarios(id,usuario,nombre,apellidos,email,rol,pass) VALUES (NULL,'".$email."','".$nombre."','".$apellidos."','".$email."',NULL,'".sha1($pass)."')";

      $this->conexion()->query($sqlInserction);
    }

  }

  // Mostrar ultimo equipo
  public function mostrarUsuario($usuario){

    if ($this->hayError()==true){
		return null;

	}else{

		$resultado = $this->conexion()->query("SELECT * FROM usuarios WHERE usuario='".$usuario."'");
		return $resultado->fetch_assoc();
	}

	}

  public function login($usuario){
    if ($this->hayError()==true){
    return null;

	}else{

    $resultado = $this->conexion()->query("SELECT * FROM usuarios WHERE usuario='".$usuario."'");
    return $resultado->fetch_assoc();
  }

  }

  
  public function updateUser($nombre,$apellidos,$roles,$email){
	   if ($this->hayError()==true){
    return null;

	}else{

    $resultado = $this->conexion()->query("UPDATE usuarios SET nombre='".$nombre."',apellidos='".$apellidos."',rol='".$roles."' WHERE email='".$email."'");
    return $resultado;
  }

  }
	
  
}

?>