<?php 
include_once("conexion.php");
class RegistroProyHack{

	function BuscarProyectos(){
		$con=new Conectar();
	 	$Conexion=$con->conexion();
		$sql="SELECT * FROM `detprodesglozado`";
		$resultado=mysqli_query($Conexion,$sql);
 		return  mysqli_fetch_all($resultado);
 		$Conexion->mysql_close();
	}
 	/*Modulo del lider de proyecto*/
 	function BuscarProyectosLider($id){
 		$id=sanitizar($id);
		$con=new Conectar();
	 	$Conexion=$con->conexion();
		$sql="SELECT * FROM `detprodesglozado` WHERE `IDComunidad`!='$id' ";
		$resultado=mysqli_query($Conexion,$sql);
 		return  mysqli_fetch_all($resultado);
 		$Conexion->mysql_close();
	}
	/*existe*/
	function ValidarRegistroUsuario(){
		$con=new Conectar();
	 	$Conexion=$con->conexion();
		$sql="SELECT `comunidad_id`, `Proyecto_id` FROM `team`";
		$resultado=mysqli_query($Conexion,$sql);
 		return  mysqli_fetch_all($resultado);
 		$Conexion->mysql_close();
	}
	/*RegistrarProyecto*/
	function EnviarSolicitud($idHacker,$idProyecto){
		$idHacker=sanitizar($idHacker);
		$idProyecto=sanitizar($idProyecto);
		$con=new Conectar();
	 	$Conexion=$con->conexion();
	 	$Validar="SELECT `comunidad_id`, `Proyecto_id`, `status` FROM `team` WHERE `comunidad_id`='$idHacker' and `Proyecto_id`='$idProyecto'";
	 	$Validacion=mysqli_query($Conexion,$Validar);
	 	$ResultadoVal=mysqli_num_rows($Validacion);
	 	if ($ResultadoVal==0) {
	 		$sql="INSERT INTO `team`(`comunidad_id`, `Proyecto_id`, `status`) VALUES ($idHacker,$idProyecto,0)";
		    $resultado=mysqli_query($Conexion,$sql);  
	 		return $resultado;	 		 
	 	}
	 	else{
	 		return "0";
	 	}
	 	
 		$Conexion->mysql_close();
	}

	function validarFecha(){
		$con=new Conectar();
 		$Conexion=$con->conexion();
 		$sql="SELECT `InicioHackaton`, `FechLimiteRegProy`, `TerminoHack` FROM `hackatonedicion` where `status`='1' ";
	 	 $resultado=mysqli_query($Conexion,$sql);
 		return  mysqli_fetch_all($resultado);
 		$Conexion->mysql_close();
		
	}

	

}
function sanitizar($text){ 		
	 	$variable=filter_var($text, FILTER_SANITIZE_STRING);
	 	return htmlspecialchars($variable);
}
?>