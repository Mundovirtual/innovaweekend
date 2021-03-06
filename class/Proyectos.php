<?php 
 include_once("conexion.php");
	 
	 class Proyecto{

	 	function MostrarProyectoPorLider($idLider){	
	 		$idLider=sanitizar($idLider); 		
	 		$con=new Conectar();
	 		$Conexion=$con->conexion();
			$sql = "SELECT `comunidad`.`id` AS `id`, `comunidad`.`Nombre` AS `Nombre`, `comunidad`.`Apellidos` AS `Apellidos`, `comunidad`.`E-mail` AS `E-mail`, `comunidad`.`Celular` AS `Celular`, `proyecto`.`id` AS `proyectoID`, `proyecto`.`Descripcion` AS `proyectoDesc`, `proyecto`.`comunidad_id` AS `IDlider`, `proyecto`.`NombreDeEquipo` AS `NombreDeEquipo`, `proyecto`.`NombreProyecto` AS `NombreProyecto`, `vertical`.`Nombre` AS `NVertical`, `vertical`.`Descripcion` AS `VDesc`, `vertical`.`InfAsesoria` AS `VAsesoria`, `hackatonedicion`.`Edicion` AS `Hedicion`, `hackatonedicion`.`status` AS `HStatus` from `proyecto` inner join `comunidad` on `proyecto`.`comunidad_id` = `comunidad`.`id` inner join `carrera` on `comunidad`.`Carrera_id` = `carrera`.`id` inner join `institucion` on `comunidad`.`Institucion_id` = `institucion`.`id` inner join `vertical` on `vertical`.`id` = `proyecto`.`Vertical_id` inner join `hackatonedicion` on `vertical`.`HackatonEdicion_id` = `hackatonedicion`.`id`  where `comunidad`.`id`='$idLider'";  
	 		$resultado=mysqli_query($Conexion,$sql);
	 		return  mysqli_fetch_all($resultado);
	 		$Conexion->mysql_close();
	 	}
	 	function existe($idLider){
	 		$idLider=sanitizar($idLider); 
	 		$con=new Conectar();
	 		$Conexion=$con->conexion();
	 		$sql="SELECT `proyecto`.`comunidad_id` , `Vertical_id` , `vertical`.`id` , `hackatonedicion`.`status` FROM `proyecto` INNER JOIN `vertical` ON `vertical`.`id` = `proyecto`.`Vertical_id` INNER JOIN `hackatonedicion` ON `hackatonedicion`.`id` = `vertical`.`HackatonEdicion_id` WHERE `hackatonedicion`.`status` = '1' and `comunidad_id` ='$idLider' LIMIT 1 ";
	 		$resultado=mysqli_query($Conexion,$sql); 
	 		return  mysqli_fetch_all($resultado);
	 		$Conexion->mysql_close();
	 	}

	 	function RegistrarProyecto($idLider,$NombreEquipo,$NombreProyecto,$VerticalId,$Descripcion){
	 		$idLider=sanitizar($idLider);
	 		$NombreEquipo=sanitizar($NombreEquipo);
	 		$NombreProyecto=sanitizar($NombreProyecto);
	 		$VerticalId=sanitizar($VerticalId);
	 		$Descripcion=sanitizar($Descripcion);

	 		$con=new Conectar();
	 		$Conexion=$con->conexion();
	 		$sql="INSERT INTO `proyecto`(`comunidad_id`, `NombreDeEquipo`, `NombreProyecto`, `Vertical_id`, `Descripcion`, `FechaRegistro`) VALUES ('$idLider','$NombreEquipo','$NombreProyecto','$VerticalId','$Descripcion',current_date())";  
	 		$resultado=mysqli_query($Conexion,$sql);
	 		return $resultado;
	 		$Conexion->mysql_close();
	 	}

	 	function ActualizarProyecto($IdProyecto,$NombreEquipo,$NombreProyecto,$VerticalId,$Descripcion){
	 		$IdProyecto=sanitizar($IdProyecto);
	 		$NombreEquipo=sanitizar($NombreEquipo);
	 		$NombreProyecto=sanitizar($NombreProyecto);
	 		$VerticalId=sanitizar($VerticalId);
	 		$Descripcion=sanitizar($Descripcion);

	 		$con=new Conectar();
	 		$Conexion=$con->conexion();

	 		$sql="UPDATE `proyecto` SET `NombreDeEquipo`='$NombreDeEquipo',`NombreProyecto`='$NombreProyecto',`Vertical_id`='$VerticalId',`Descripcion`='$Descripcion' WHERE `id`='$IdProyecto' ";  
	 		$resultado=mysqli_query($Conexion,$sql);
	 		return $resultado;
	 		$Conexion->mysql_close();
	 	}
	 	function Verticales(){
	 		$con=new Conectar();
	 		$Conexion=$con->conexion();
	 		$sql = "SELECT `vertical`.`id`, `vertical`.`Nombre`, `vertical`.`Descripcion`, `vertical`.`InfAsesoria`, `vertical`.`HackatonEdicion_id`, `hackatonedicion`.`id`, `hackatonedicion`.`status` FROM `vertical` inner join `hackatonedicion` on `hackatonedicion`.`id`=`vertical`.`HackatonEdicion_id` where `hackatonedicion`.`status` ='1' "; 
	 		$resultado=mysqli_query($Conexion,$sql);
	 		return   mysqli_fetch_all($resultado);
	 		$Conexion->mysql_close();
	 	}
	 	
 		function calificaciones_x_proyecto($idLider){
 			$idLider=sanitizar($idLider);
	 		$con=new Conectar();
	 		$Conexion=$con->conexion();
	 		$sql = "SELECT  `calificacion_final_proyecto`.`fase`, `calificacion_final_proyecto`.`calf`  FROM `calificacion_final_proyecto` inner join `proyecto` on `proyecto`.`id`=`calificacion_final_proyecto`.`idproyecto` inner join `comunidad` on `proyecto`.`comunidad_id`=`comunidad`.`id` inner join `vertical` on `vertical`.`id`=`calificacion_final_proyecto`.`idvertical` inner join `hackatonedicion` on `hackatonedicion`.`id`=`calificacion_final_proyecto`.`idHack` WHERE `hackatonedicion`.`status`='1' and `proyecto`.`comunidad_id`='$idLider' ORDER BY `vertical`.`id`,`calificacion_final_proyecto`.`fase`,`calificacion_final_proyecto`.`calf` DESC "; 
	 		 
	 		$resultado=mysqli_query($Conexion,$sql);
	 		return   mysqli_fetch_all($resultado);
	 		$Conexion->mysql_close();
	 	}
 		
	 	
	 }
	 
	 function sanitizar($text){ 		
	 	$variable=filter_var($text, FILTER_SANITIZE_STRING);
	 	return htmlspecialchars($variable);
	 }
 

 ?>