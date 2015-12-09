<?php
global $wpdb;
$nombrecomponente="";
//Almacenando registros
if(isset($_POST["newcomponente"])){
$nombrecomponente=$_POST["newnombrecomponente"];
$wpdb->query( 
	$wpdb->prepare( 
				"INSERT INTO dgpc_componenteherramienta (nombre) VALUES (%s)", 
     			$nombrecomponente) 
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
if(isset($_POST["delcomponente"])){
$id=$_POST["delcodigocomponente"];	
$wpdb->query( 
	$wpdb->prepare( 
				"delete FROM dgpc_componenteherramienta WHERE idcomponente=%d", 
     			$id) 
	);
}
//fin eliminacion
//Actualizacion
if(isset($_POST["editcomponente"])){
$id=$_POST["editcodigocomponente"];
$nombrecomponente=$_POST["editnombrecomponente"];	
$wpdb->query( 
	$wpdb->prepare( 
				"UPDATE dgpc_componenteherramienta SET nombre=%s WHERE idcomponente=%d", 
     			$nombrecomponente,$id) 
	);
}
//fin actualizacion
//consultando registros
$datoscomponente="";
$datoscomponente=$wpdb->get_results( 
		"select idcomponente,nombre from dgpc_componenteherramienta order by nombre"    
	);
echo "
<script>
$(document).ready(function() {
// Select tab by name
$('.nav-tabs a[href=#".$tab."]').tab('show');
   $('#datoscomponente').DataTable();
   $('.borrarcomponente').click(function() {
   		$('#delcodigocomponente').val($(this).val());
   		$('#ModalDelcomponente').modal();
	});

	$('.editarcomponente').click(function() {
   		var datos=$(this).val().split('|');
   		$('#editcodigocomponente').val(datos[0]);
   		$('#editnombrecomponente').val(datos[1]);
   		$('#ModalEditcomponente').modal();
	});
} );
</script>
</br>
    <div role='tabpanel' class='tab-pane' id='componente'>
	    <form role='form' name=fcomponente1 method=post>
	    	 <div class='row'>
	    	 	<div class='col-xs-2'>
	    	 		<label for=newnombrecomponente>Nombre del componente</label>
	    	 	</div>
	    	 	<div class='col-xs-3'>
	    	 		<input type=hidden name=tab id=tab value='componente'>		
	    			<input type=text name=newnombrecomponente id=newnombrecomponente class='form-control'> 
	        	</div>
	        	<select name=area>
	        		<option>ANÁLISIS DE RIESGO</option> 
					<option>REDUCCIÓN DE RIESGOS</option> 
					<option>MANEJO DE EVENTOS ADVERSOS</option>
					<option>RECUPERACIÓN</option>
	        		
	        	</select>
				<button type='submit' class='btn btn-success' name=newcomponente id=newcomponente value='ok'>
					<span class='glyphicon glyphicon-plus'></span>
				</button>
	      	</div> 
	    </form>
	    </br>
	  
			<div class='table-responsive'>
				<table class='table table-hover table-bordered' id=datoscomponente>
					<thead>
					<tr>
						<th class='text-center'>Código</th>
						<th class='text-center'>
							Nombre del componente. 
						</th>
						<th class='text-center'>
							
						</th>
					</tr>
					<thead>
					<tbody>
					";

					if($datoscomponente!=""){
						foreach ($datoscomponente as $reg) {
							echo "
					<tr>
						<td class='text-center'>"
							.$reg->idcomponente."
						</td>
						<td>".
							$reg->nombre."
						</td>
						<td>
							<button type='button' class='btn btn-success editarcomponente' name=editarcomponente id=editarcomponente value='".$reg->idcomponente."|".$reg->nombre."'>
								<span class='glyphicon glyphicon-pencil'></span>
							</button>       
							
							<button type='button' class='btn btn-warning borrarcomponente' name=borrarcomponente id='borrarcomponente' value='".$reg->idcomponente."'>
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
  <div class="modal fade" id="ModalEditcomponente" role="dialog"  tabindex="-1">
    <form role='form' name=fcomponente2 method=post>
	    <div class="modal-dialog modal-sm" >
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Actualización de instituciones</h4>
	        </div>
	        <div class="modal-body">
		    	 	<div class='form-group'>
		    	 		<label for=editnombrecomponente>Nombre de la Institución</label>
		    	 		  <input type=hidden name=editcodigocomponente id=editcodigocomponente>
		    	 		  <input type=hidden name=tab id=tab value='componente'>
		    	 		<input type=text required name=editnombrecomponente id=editnombrecomponente class='form-control'>             	
		      		</div> 
		    
	        </div>
	        <div class="modal-footer">
	        	<button type='submit' class='btn btn-success' name=editcomponente id=editcomponente value=ok>
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
  <div class="modal fade" id="ModalDelcomponente" role="dialog"  tabindex="-1">
    <form role='form' name=fcomponente3 method=post>
	    <div class="modal-dialog modal-sm" >
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title warning">¿confirme que desea eliminar el registro?</h4>
	          <input type=hidden name=delcodigocomponente id=delcodigocomponente>
	          <input type=hidden name=tab id=tab value='componente'>
	        </div>
	        
	        <div class="modal-footer">
	        	<button type='submit' class='btn btn-success' name=delcomponente value=ok>
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