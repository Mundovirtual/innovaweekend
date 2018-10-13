 
<?php 
 	include_once("../login/security.php");  
	require_once("modulos/perfil/DatosPerfil.php");
	 $Lider = new Lider();
	 $ver =$Lider->mostrarDatos($id);  
 ?>
<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card">
				<h3 class="card-header text-center bg-dark text-white">Mi perfil</h3>
				<div class="card-header">
					<div class="text-center">
						<i class="fas fa-user-circle fa-8x"></i>
					</div>

					<div class="form-group">
						<h3 class="text-center"><?php echo $_SESSION['Nombre'];?></h3>
					</div>
					<div class="row">	
						<button class="form-control btn btn-primary">Bienvenid@</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<div class="progress">
				   <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"   aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>		
			    </div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-10">
					<form id="formulario_perfil">
					<div class="form-group">
						<h2>Datos personales</h2>
					</div>
					<div class="form-group">
						<label for="#" class="label-control">Nombre</label>
						<input type="text" class="form-control bg-white" name="nombre" id="nombre" value="<?php  echo $ver[0][1]?>" >
					</div>

					<div class="form-group">
						<label for="#" class="label-control">Apellidos</label>
							<input type="text" class="form-control bg-white" id="Apellidos" name="Apellidos" value="<?php echo $ver[0][2];?>">


					</div>

					<div class="form-group">
						<label for="#" class="label-control">E-mail</label>
						<input type="text" class="form-control bg-white"  id="Correos" name="Correos" value="<?php echo $ver[0][3];?>" >
					</div>

					<div class="form-group">
						<label for="#" class="label-control">Cel</label>
						<input type="text" class="form-control bg-white" id="cel" name="cel" value="<?php echo $ver[0][5];?>" >
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	 $(document).ready(function(){
 	 	$("#nombre").prop('disabled', true);
		$("#Apellidos").prop('disabled', true);
		$("#Correos").prop('disabled', true);
		$("#cel").prop('disabled', true);
   		
});
	</script>