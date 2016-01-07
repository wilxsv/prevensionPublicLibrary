<?php 
include(plugin_dir_path( __FILE__ )."../catalogs/cabecera.php");
global $wpdb;
if(isset($_POST["newpublicacion"])){
  $idherramienta=$_POST["idherramienta"];
  $idioma=$_POST["idioma"];
  $descripcion=$_POST["descripcion"];
  $archivo=$_FILES["pubArchivo"];
  $pubInicio=$_POST["pubInicio"];
  $pubFin=$_POST["pubFin"];
  $acceso=$_POST["acceso"];

  $fi = explode('/',$pubInicio);
  $pubInicio = $fi[2].'-'.$fi[1].'-'.$fi[0];

  $ff = explode('/',$pubFin);
  $pubFin = $ff[2].'-'.$ff[1].'-'.$ff[0];

    $darea=$wpdb->get_col(
        $wpdb->prepare("
            select dgpc_area.nombre from dgpc_area inner join dgpc_componente
            on dgpc_area.idarea=dgpc_componente.idarea
            inner join dgpc_herramienta on dgpc_componente.idcomponente=dgpc_herramienta.idcomponente
            where dgpc_herramienta.idherramienta=%d
          ",$idherramienta)
      );
    $dtipo=$wpdb->get_col(
        $wpdb->prepare("
            select dgpc_tipoherramienta.nombre from dgpc_tipoherramienta 
            inner join dgpc_herramienta on dgpc_tipoherramienta.idtipo=dgpc_herramienta.idtipoherramienta 
         where dgpc_herramienta.idherramienta=%d
          ",$idherramienta)
      );
   if(!file_exists(plugin_dir_path( __FILE__ )."../biblioDocs/_".$darea[0]."_")){
      mkdir(plugin_dir_path( __FILE__ )."../biblioDocs/_".$darea[0]."_");
    }
     if(!file_exists(plugin_dir_path( __FILE__ )."../biblioDocs/_".$darea[0]."_/_".$dtipo[0])."_"){
      mkdir(plugin_dir_path( __FILE__ )."../biblioDocs/_".$darea[0]."_/_".$dtipo[0]."_");
    }
    $path=plugin_dir_path( __FILE__ )."../biblioDocs/_".$darea[0]."_/_".$dtipo[0]."_/";
  //almacenando la publicacion
  $r=$wpdb->query(
          $wpdb->prepare(
            "INSERT INTO dgpc_publicacion(
              idherramienta,archivo,portada,tipoarchivo,
              fechaInicio,fechaFin,descripcion,idioma,acceso,peso) values(%d,%s,%s,%s,%s,%s,%s,%s,%s,%f)",
              $idherramienta,$path.$archivo["name"],'portada',$archivo["type"],$pubInicio,
              $pubFin,$descripcion,$idioma,$acceso,$archivo["size"]
            )

    );
  //Copiando archivo falta chequear el path segun lo indico William biblioDocs/_AREA_/_TIPO_
  if($r==1){
   
   
    @copy($archivo["tmp_name"],$path.$archivo["name"]);
      
  } 
  

 
}
$herramientas=$wpdb->get_results( 
    "select dgpc_herramienta.idherramienta, 
    dgpc_herramienta.nombre, 
    dgpc_componente.nombre as nombreComponente,
    dgpc_tipoherramienta.nombre as nombreTipo, 
    dgpc_claseherramienta.nombre as nombreClase,
    dgpc_publicacion.peso
    from dgpc_herramienta 
    inner join dgpc_tipoherramienta on dgpc_herramienta.idtipoherramienta=dgpc_tipoherramienta.idtipo 
    inner join dgpc_claseherramienta on dgpc_herramienta.idclaseherramienta=dgpc_claseherramienta.idclase 
    inner join dgpc_componente on dgpc_herramienta.idcomponente=dgpc_componente.idcomponente 
    inner join dgpc_area on dgpc_area.idarea=dgpc_componente.idarea 
    left join dgpc_publicacion on dgpc_herramienta.idherramienta=dgpc_publicacion.idherramienta
    order by dgpc_herramienta.idherramienta desc"    
  );
?>
<div class="wrap">
 <h1>Listado de Herramientas registradas en la biblioteca</h1>
 <table class="wp-list-table widefat fixed striped posts">
  <thead>
   <tr>
	<th class="manage-column">Nombre</th>

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
            <td>".$h->nombreComponente."</td>
            <td>".$h->nombreTipo."</td>
            <td>".$h->nombreClase."</td>
            <td>".round(($h->peso)/(1024*1024),2)." MB</td>
            <td>
              <button type='button' class='btn btn-success publich' name=publich id=publich value=".$h->idherramienta.">
                <span class='glyphicon glyphicon-globe'>Publicar</span>
              </button> </td>
          </tr>
      ";
    }
   ?>
   
  </tbody>
  <tfoot>
	<th class="manage-column">Nombre</th>
  
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
    <form role='form' name=fpublicacion method=post enctype="multipart/form-data">
      <div class="modal-dialog modal-md" >
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Publicar Herramienta</h4>
          </div>
          <div class="modal-body">
            <div class='form-group'>
              <label for=descripcion>Descripción</label>
                <input type=hidden name=idherramienta id=idherramienta>
                <textarea required name=descripcion id=descripcion class='form-control'></textarea>               
              </div> 
            <div class='form-group'>
                <label for=idioma>Idioma</label>
                <select name=idioma class='form-control'>
                  <option>Español</option>
                  <option>Ingles</option>
                  <option>Aleman</option>
                </select>
            </div>  
            <div class='form-group'>
                <label for=pubArchivo>Archivo</label>
                <input type=file id=pubArchivo name=pubArchivo required class='form-control' />  
            </div>  
            <div class='form-group'>
                <div class="col-md-4">
                <label for=pubInicio>Inicio de Publicación</label>
                </div>
                <div class="col-md-4">
                  <input type='text' name="pubInicio" id='pubInicio' class='form-control date-picker' />  
                </div> 
            </div>
            <div class="clear">
            <div class='form-group'>
              <div class="col-md-4">
                <label for=pubFin>Fin de Publicación</label>
              </div>
              <div class="col-md-4">
                <input type=text name=pubFin id=pubFin required class='form-control date-picker' />
              </div> 
            </div> 
            <div class="clear"> 
            <div class='form-group'>
                <label for=idioma>Acceso</label>
                <select name=acceso class='form-control'>
                  <option>Publico</option>
                  <option>Privado</option>
                  </select>
            </div>  
            
          </div>
          <div class="modal-footer">
            <button type='submit' class='btn btn-success' name=newpublicacion id=newpublicacion value='ok'>
            <span class='glyphicon glyphicon-globe'>Publicar</span>
           </button>
        </button> 
              <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-ban-circle'>Cancelar</span>  
              </button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script type="text/javascript">
 $('.publich').click(function() {

      $('#ModalPublicacion').modal();
      $('#idherramienta').val($(this).val());
  });

jQuery(document).ready(function() {
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 changeMonth: true,
 changeYear: true, 
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);

    $("#pubInicio").datepicker();
    $('#pubFin').datepicker();
    $("#pubInicio").on("change", function (e) {
            $('#pubFin').datepicker('option', 'minDate', $(this).val()); 
        });
        $("#pubFin").on("change", function (e) {
            $('#pubInicio').datepicker('option', 'maxDate', $(this).val());
        });  
});
</script>
