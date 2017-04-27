<?php
/**
 *
 */
class seguridad 
{
	private $usuarios=null;
	
  function __construct()
  {
    session_start();
	if(isset($_SESSION['usuario'])){ $this->usuarios=$_SESSION['usuario'];
	}

  }
  
  public function getUsuario(){
	return $this->usuarios;
  }
  
  public function addUsuario($usuario){
	$_SESSION['usuario']=$usuario;
	$this->usuarios=$usuario;
  }
  
  public function logout(){
    $_SESSION=[];
	  session_destroy();
  }

  public function cookies(){
    if (isset($_COOKIE['fondo'])) {
      $fondo=$_COOKIE['fondo'];
      return $fondo;
    }else{
      return null;
    }
  }
  }
  ?>