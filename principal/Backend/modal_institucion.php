<form id="guardarDatos" method="post">
                    <div class="modal fade" id="miModal" tabindex="-1" role = "dialog" aria-LabelLedby = "myModalLabel" aria-hidden = "true">
                      <div class="modal-dialog" role = "document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><i class="fas fa-sign-out-alt"></i> Registrar Institucion</h4>
                            <button type = "button" class="close" data-dismiss = "modal" arial-label = "Close"><span aria-hidden = "true">&times;</span></button>
                          </div>

                          <div class="modal-body">
                            <div class="form-group">
                              <div id="datos-registrado-ajax"></div>
                              <label class="control-label text-danger">Institucion</label>
                              <input type="text" class="form-control text-dark" id="i" name="i" placeholder="Ingresar Institucion" name = "i" onkeypress="return carrerainstitucion(event)" onpaste = "alert('No permitido Ctrl + v');return false">
                            </div>
                          </div>

                          <div class="modal-footer">
                              <button type = "button" class="btn btn-danger" data-dismiss = "modal"><i class="fas fa-times"> Cerrar</i> </button>
                              <button type = "submit" id="b" class="btn btn-danger"><i class="fas fa-check"> Guardar datos</i> </button>
                          </div>
                        </div>
                      </div>
                    </div>
                   </form>
<!--Fin del modal-->


<script type="text/javascript">

 $('#b').click(function(){
    var datos = $('#guardarDatos').serialize();
     $.ajax({
          type: 'post',
          url: 'Backend/guardarInst.php',
          data: datos,
          beforeSend:function(c){
           $("#datos-registrado-ajax").html('<div class="alert alert-success alert-dismissible fade show text-center" role="alert"><i class="fas fa-times"></i><strong> Procesando..... !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          },
          success: function(respuesta) {
           $("#datos-registrado-ajax").html(respuesta);
           visualizarInstitucion();

          }
      })
   });

 function carrerainstitucion(e) {
        key = e.keyCode || e.which;
        teclado = String.fromCharCode(key).toLowerCase();
        letras = "abcdefghijklmnñopqrstuvwxyzáéíóú1234567890 ";
        especiales = "9-32-37-38-46-164";
        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true;
                break;
            }
        }
        if (letras.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
        }
     }
 
</script>