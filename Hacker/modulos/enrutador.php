<?php 
	class enrutador{
		public function cargarVista($vista){
 			
			switch ($vista) {
			    case "1": 
			        include_once("view/MiPerfil.php");      
			        break;
			    case "2": 
			        include_once("view/MisProyectos.php");			         
			        break;
			    case "3": 
			        include_once("view/proyecto.php");			         
			        break; 
		        case "4": 
			        include_once("view/solicitudes.php");			         
			        break; 
		        
			    case "error":
			    	include_once("view/".$vista.".php");
			    	break;	
			    default:	
					include_once("view/error.php");
			}

		}
		
		public function validarGET($variable){ 
			if (empty($variable)) { 
				 include_once("index.php");

			}
			else{
				return true;
			}
		} 
	}


?>