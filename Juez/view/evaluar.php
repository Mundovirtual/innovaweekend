<?php 
include_once("../login/securityJuez.php");   

 ?>
  
 <div id="MostrarEstado" style="display: none;"> 	
 	<div class="starter-template text-center">
		<h1 class="display-1" id="MostrarMensajeFase"></h1>
        <h1 id="MostrarEstadoFase"></h1>
        <p class="lead" id="MensajeInformacion">Espere a que el administrador active la fase correspondiente</p>
      
      </div>
 </div>

    



<div id="ControlVistaFase" style="display: none;">
		
	<div class="container-fluid">
		<div class="form-group">
			<div class="row">
			   <div class="col-md-12 bg-dark text-white text-center p-2">
				 <h1>Proyectos a evaluar</h1>
			   </div>
		   </div>
		</div>
		<div class="form-group">
			<div class="row justify-content-center">

				<div class="col-md-4" id="CategoriaVerticales"> 			
				</div>
				
				<div class="col-md-3">
					<h1 class="text-center text-danger aling-self-center" id="TextoEtapa"></h1>
				</div>
			</div>
			
		</div>
		<div class="container">
			 
	</div>
	 </div>
	<body>
		 <div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<table class="table table-hover" id="TablaProyectos">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Equipo</th> 
				      <th scope="col">Vertical</th>
				      <th scope="col">proyecto</th> 
				      <th scope="col">Detalles</th>
				      <th scope="col">Calificar</th>
				    </tr>
				  </thead>
				  <tbody> 

				  </tbody>
				</table>			
			</div>
			<div class="col-md-1">
			</div>
		</div>

	</body>


	<!-- DetallesEquipo -->
	<div class="modal fade" id="DetallesEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="Editar"><i class="fas fa-pencil-alt"></i>Datos Proyecto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	       	<div class="form-row ">
			    <div class="col-md-12">
			      <label for="Descripcion">Descripcion</label>
			      <textarea type="text" class="form-control" id="DescripcionProyecto"  disabled="">		      	
			      </textarea> 
			    </div>
			    <div class="col-md-8">
			      <label for="Descripcion">Lider</label>
			      <input  type="text" class="form-control" id="lider"  disabled=""></input> 
			    </div>
			     <div class="col-md-4">
			      <label for="Telefono">Fecha de registro</label>
			      		<input type="text" class="form-control" id="RegistroProyecto" value="2/85/1985" disabled="">
			    </div>
			    <div class="row text-center">
				    <div class="col-md-6">
				    	<label for="Descripcion">E-mail</label>
			      		<input  type="text" class="form-control" id="email"  disabled=""></input> 
				    </div>
				    <div class="col-md-6">
				    	<label for="Descripcion">Telefono</label>
			      		<input  type="text" class="form-control" id="telefono"  disabled=""></input> 
				    </div>
				    

			    </div>

			    		     
		 	</div>

		   	<div class="form-row"> 
					<div class="col-md-1">
					</div>
					<div class="col-md-10">
						 <header class="text-center">Integrantes</header>
						<div id="TablaIntegrantes">
							
						</div>	  					     
					</div>
					<div class="col-md-1">
					</div>
				</div>	 
	   </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button> 
	      </div>
	    </div>
	  </div>
	</div>

	  

	<div class="modal fade" id="CalificarProyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        
	        <h5 class="modal-title">
	        	<i class="fas fa-chalkboard-teacher"></i>Calificaciones
	        </h5>	      

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      
	      </div>
	    <div class="modal-body">	      		
		  	<section id="TablaRubricas">
		  		
		  	</section>

	    </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        <button type="button" class="btn btn-success" id="ActualizarHack" onclick="RegistrarEvaluacion()">Registrar</button>
	      </div>
	    </div>
	  </div>
	</div> 


</div>

 
 <script src="modulos/proyectos/proyecto.js"></script>

 
 