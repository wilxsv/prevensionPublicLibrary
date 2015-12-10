<?php
global $wpdb;
$nombrecontacto="";
//Almacenando registros
if(isset($_POST["newcontacto"])){
$nombrecontacto=$_POST["newnombrecontacto"];
$wpdb->query( 
	$wpdb->prepare( 
				"INSERT INTO dgpc_contacto (nombre) VALUES (%s)", 
     			$nombrecontacto) 
	);
	echo "
		<div>
  			<div class='alert alert-success'>
    			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    			<strong>Registro almacenado correctamente!</strong> 
    			
  			</div>
		</div>
	";
}
//Fin guardar registros
//Eliminando Reg
if(isset($_POST["delcontacto"])){
$id=$_POST["delcodigocontacto"];	
$wpdb->query( 
	$wpdb->prepare( 
				"delete FROM dgpc_contacto WHERE idcontacto=%d", 
     			$id) 
	);
}
//fin eliminacion
//Actualizacion
if(isset($_POST["editcontacto"])){
$id=$_POST["editcodigocontacto"];
$nombrecontacto=$_POST["editnombrecontacto"];	
$wpdb->query( 
	$wpdb->prepare( 
				"UPDATE dgpc_contacto SET nombre=%s WHERE idcontacto=%d", 
     			$nombrecontacto,$id) 
	);
}
//fin actualizacion
//consultando registros
$datoscontacto="";
$datoscontacto=$wpdb->get_results( 
		"select idcontacto,nombre from dgpc_contacto order by nombre"    
	);
echo "
<script>
$(document).ready(function() {
// Select tab by name
$('.nav-tabs a[href=#".$tab."]').tab('show');
   $('#datoscontacto').DataTable();
   $('.borrarcontacto').click(function() {
   		$('#delcodigocontacto').val($(this).val());
   		$('#ModalDelcontacto').modal();
	});

	$('.editarcontacto').click(function() {
   		var datos=$(this).val().split('|');
   		$('#editcodigocontacto').val(datos[0]);
   		$('#editnombrecontacto').val(datos[1]);
   		$('#ModalEditcontacto').modal();
	});
} );
</script>
    <div role='tabpanel' class='tab-pane' id='contacto'>
	    <form role='form' name=fcontacto1 method=post>
	    	 <div class='row'>
	    	 	<div class='col-xs-4'>
	    	 		<label for=newnombrecontacto>Nombre</label>
	    	 	</div>
	    	 	<div class='col-xs-6'>
	    	 		<input type=hidden name=tab id=tab value='contacto'>		
	    			<input type=text name=newnombrecontacto id=newnombrecontacto class='form-control'> 
	        	</div>
	        	
				<button type='submit' class='btn btn-success' name=newcontacto id=newcontacto value='ok'>
					<span class='glyphicon glyphicon-plus'></span>
				</button>
	      	</div> 
	    </form>
	    </br>
	  
			<div class='table-responsive'>
				<table class='table table-hover table-bordered' id=datoscontacto>
					<thead>
					<tr>
						<th class='text-center'>Código</th>
						<th class='text-center'>
							Nombre
						</th>
						<th class='text-center'>
							
						</th>
					</tr>
					<thead>
					<tbody>
					";

					if($datoscontacto!=""){
						foreach ($datoscontacto as $reg) {
							echo "
					<tr>
						<td class='text-center'>"
							.$reg->idcontacto."
						</td>
						<td>".
							$reg->nombre."
						</td>
						<td>
							<button type='button' class='btn btn-success editarcontacto' name=editarcontacto id=editarcontacto value='".$reg->idcontacto."|".$reg->nombre."'>
								<span class='glyphicon glyphicon-pencil'></span>
							</button>       
							
							<button type='button' class='btn btn-warning borrarcontacto' name=borrarcontacto id='borrarcontacto' value='".$reg->idcontacto."'>
							<span class='glyphicon glyphicon-trash'></span>
							</button>
						</td>
					</tr>	
							";
						}
					}
					
				echo"</tbody>	
				</table>
	    	</div>
	 ";
 ?>
 	</div>

<div>
 <!-- Modal EDIT -->
  <div class="modal fade" id="ModalEditcontacto" role="dialog"  tabindex="-1">
    <form role='form' name=fcontacto2 method=post>
	    <div class="modal-dialog modal-sm" >
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Actualización de instituciones</h4>
	        </div>
	        <div class="modal-body">
		    	 	<div class='form-group'>
		    	 		<label for=editnombrecontacto>Nombre de la Institución</label>
		    	 		  <input type=hidden name=editcodigocontacto id=editcodigocontacto>
		    	 		  <input type=hidden name=tab id=tab value='contacto'>
		    	 		<input type=text required name=editnombrecontacto id=editnombrecontacto class='form-control'>             	
		      		</div> 
		    
	        </div>
	        <div class="modal-footer">
	        	<button type='submit' class='btn btn-success' name=editcontacto id=editcontacto value=ok>
					<span class='glyphicon glyphicon-ok'></span>
				</button>	
	          	<button type="button" class="btn btn-warning" data-dismiss="modal">
	          		<span class='glyphicon glyphicon-ban-circle'></span>	
	          	</button>
	        </div>
	      </div>
	    </div>
    </form>
  </div>
</div>  
<div>
 <!-- Modal DEL -->
  <div class="modal fade" id="ModalDelcontacto" role="dialog"  tabindex="-1">
    <form role='form' name=fcontacto3 method=post>
	    <div class="modal-dialog modal-sm" >
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title warning">¿confirme que desea eliminar el registro?</h4>
	          <input type=hidden name=delcodigocontacto id=delcodigocontacto>
	          <input type=hidden name=tab id=tab value='contacto'>
	        </div>
	        
	        <div class="modal-footer">
	        	<button type='submit' class='btn btn-success' name=delcontacto value=ok>
					<span class='glyphicon glyphicon-ok'></span>
				</button>	
	          	<button type="button" class="btn btn-warning" data-dismiss="modal">
	          		<span class='glyphicon glyphicon-ban-circle'></span>	
	          	</button>
	        </div>
	      </div>
	    </div>
    </form>
  </div>
</div>  