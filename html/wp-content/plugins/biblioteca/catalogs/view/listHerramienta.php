<?php //consultando registros
include("/../cabecera.php");
global $wpdb;
$herramientas=$wpdb->get_results( 
    "select dgpc_herramienta.idherramienta, 
    dgpc_herramienta.nombre, 
    dgpc_componente.nombre as nombreComponente,
     dgpc_tipoherramienta.nombre as nombreTipo, 
     dgpc_claseherramienta.nombre as nombreClase
    from dgpc_herramienta 
    inner join dgpc_tipoherramienta on dgpc_herramienta.idtipoherramienta=dgpc_tipoherramienta.idtipo 
    inner join dgpc_claseherramienta on dgpc_herramienta.idclaseherramienta=dgpc_claseherramienta.idclase 
    inner join dgpc_componente on dgpc_herramienta.idcomponente=dgpc_componente.idcomponente 
    inner join dgpc_area on dgpc_area.idarea=dgpc_componente.idarea 
    order by dgpc_herramienta.idherramienta desc"    
  );
?>
<div class="wrap">
 <h1>Listado de Herramientas registradas en la biblioteca</h1>
 <table class="wp-list-table widefat fixed striped posts">
  <thead>
   <tr>
	<th class="manage-column">Nombre</th>
    <th class="manage-column">Publicada</th>
    <th class="manage-column">Componente</th>
    <th class="manage-column">Tipo</th>
    <th class="manage-column">Clase</th>
    <th class="manage-column">Peso</th>
    <th class="manage-column">Acciones</th>
   </tr>
  </thead>
  <tbody id="the-list">
  <?php
    foreach ($herramientas as $h) {
      echo"
         <tr>
            <td>".$h->nombre."</td>
            <td></td>
            <td>".$h->nombreComponente."</td>
            <td>".$h->nombreTipo."</td>
            <td>".$h->nombreClase."</td>
            <td></td>
            <td>
              <button type='button' class='btn btn-success publich' name=publich id=publich>
                <span class='glyphicon glyphicon-pencil'></span>
              </button> </td>
          </tr>
      ";
    }
   ?>
   
  </tbody>
  <tfoot>
	<th class="manage-column">Nombre</th>
    <th class="manage-column">Publicada</th>
    <th class="manage-column">Componente</th>
    <th class="manage-column">Tipo</th>
    <th class="manage-column">Clase</th>
    <th class="manage-column">Peso</th>
    <th class="manage-column">Acciones</th>
  </tfoot>
 </table>
 <div class="card pressthis">
  <p>Informacion que se considere necesaria ...... o derechos de autor de proteccion civil</p>
 </div>
</div>
<?php /*include(plugin_dir_path( __FILE__ )."../cabecera.php"); */ ?>
<!--
<div class="tab-content"> 
 <div class="row">
  <div class="table-responsive">
   <table class="table table-hover ">
	<thead>
	 <tr>
	  <th class="text-center">Código</th>
	  <th class="text-center">Nombre del área </th>
	 </tr>
	</thead>
	<tbody>
	 <tr>
	  <td></td>
	  <td></td>
	  <td>
	   <button type="button" class="btn btn-success editFicha" name="editFicha" id="editFicha" value="">
		<span class="glyphicon glyphicon-pencil"></span>
	   </button>
	   <button type="button" class="btn btn-warning borrarFicha" name="borrarFicha" id="borrarFicha" value="">
		<span class="glyphicon glyphicon-trash"></span>
	   </button>
	  </td>
	 </tr>
	</tbody>	
   </table>
  </div>
 </div>
</div>
-->
<!-- Modal EDIT -->
  <div class="modal fade" id="ModalPublicacion" role="dialog"  tabindex="-1">
    <form role='form' name=fpublicacion method=post>
      <div class="modal-dialog modal-sm" >
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Publicar Herramienta</h4>
          </div>
          <div class="modal-body">
            <div class='form-group'>
              <label for=descripcion>Descripción</label>
                <input type=hidden name=codigoherramienta id=ecodigoherramienta>
                <input type=text required name=descripcion id=descripcion class='form-control'>               
              </div> 
            <div class='form-group'>
                <label for=idioma>Idioma</label>
                <select name=idioma>
                  <option value="es">Español</option>
                  <option value="en">Ingles</option>
                  <option value="gr">Aleman</option>
                </select>
            </div>  
            <div class='form-group'>
                <label for=idioma>Archivo</label>
                <input type=file id=pubArchivo name=pubArchivo multiple=multiple required />  
            </div>  
            <div class='form-group'>
                <label for=idioma>Inicio de Publicación</label>
                <input type='text' name="pubInicio" id='pubInicio' />  
            </div>  
            <div class='form-group'>
                <label for=idioma>Fin de Publicación</label>
                <input type=text name=pubFin id=pubFin required/>
            </div>  
            <div class='form-group'>
                <label for=idioma>Acceso</label>
                <select name=acceso>
                  <option value=1>Publico</option>
                  <option value=0>Privado</option>
                  </select>
            </div>  
            <button type='submit' class='btn btn-success' name=newclase id=newclase value='ok'>
            <span class='glyphicon glyphicon-plus'>Publicar</span>
           </button>
          </div>
          <div class="modal-footer">
            <button type='submit' class='btn btn-success' name=editarea id=editarea value=ok>
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
  <script>
  $('.publich').click(function() {
      $('#ModalPublicacion').modal();
  });
  </script>