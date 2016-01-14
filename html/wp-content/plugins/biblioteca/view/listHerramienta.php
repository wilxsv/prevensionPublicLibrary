<?php 
include(plugin_dir_path( __FILE__ )."../catalogs/cabecera.php");
global $wpdb;
function normalize ($string) {
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r',
    );

    return strtr($string, $table);
}

//eliminando publicacion
if(isset($_POST["delpublicacion"])){
  $idpublicacion=$_POST["delcodigopublicacion"];
  $contenido=$wpdb->get_results(       
              "select dgpc_publicacion.archivo,dgpc_publicacion.portada from dgpc_publicacion
               where dgpc_publicacion.idpublicacion=$idpublicacion"
            );
    foreach ($contenido as $reg) {
        $nom=explode("/", $reg->archivo);
        $nomp=explode("/", $reg->portada);
        if(is_file(plugin_dir_path( __FILE__ )."../biblioDocs/".$nom[count($nom)-3]."/".$nom[count($nom)-2]."/".$nom[count($nom)-1])){
          @unlink(plugin_dir_path( __FILE__ )."../biblioDocs/".$nom[count($nom)-3]."/".$nom[count($nom)-2]."/".$nom[count($nom)-1]);
          @unlink(plugin_dir_path( __FILE__ )."../biblioDocs/".$nomp[count($nomp)-3]."/".$nomp[count($nomp)-2]."/".$nomp[count($nomp)-1]);
        }
    }
        

  $r=$wpdb->query(
          $wpdb->prepare(
            "DELETE FROM dgpc_publicacion WHERE idpublicacion=%d",
              $idpublicacion
            )

    );

}
if(isset($_POST["newpublicacion"])){
  $idherramienta=$_POST["idherramienta"];
  $idioma=$_POST["idioma"];
  $descripcion=$_POST["descripcion"];
  $archivo=$_FILES["pubArchivo"];
  $archivoPortada=$_FILES["pubPortada"];
  $pubInicio=$_POST["pubInicio"];
  $pubFin=$_POST["pubFin"];
  $acceso=$_POST["acceso"];
//Comprobando que no tenga una publicacion
  $v=$wpdb->get_results(
        "select idherramienta from dgpc_publicacion where idherramienta='".$idherramienta."'"
     
  );
  if($wpdb->num_rows==0){

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
         if(!file_exists(plugin_dir_path( __FILE__ )."../biblioDocs/_".normalize($darea[0])."_")){
            @mkdir(plugin_dir_path( __FILE__ )."../biblioDocs/_".normalize($darea[0])."_");
          }
           if(!file_exists(plugin_dir_path( __FILE__ )."../biblioDocs/_".normalize($darea[0])."_/_".normalize($dtipo[0]))."_"){
            @mkdir(plugin_dir_path( __FILE__ )."../biblioDocs/_".normalize($darea[0])."_/_".normalize($dtipo[0])."_");
          }
          $path=plugins_url()."/biblioteca/biblioDocs/_".normalize($darea[0])."_/_".normalize($dtipo[0])."_/";

        //almacenando la publicacion
        $r=$wpdb->query(
                $wpdb->prepare(
                  "INSERT INTO dgpc_publicacion(
                    idherramienta,archivo,portada,tipoarchivo,
                    fechaInicio,fechaFin,descripcion,idioma,acceso,peso) values(%d,%s,%s,%s,%s,%s,%s,%s,%s,%f)",
                    $idherramienta,$path.normalize($archivo["name"]),$path.normalize($archivoPortada["name"]),$archivo["type"],$pubInicio,
                    $pubFin,$descripcion,$idioma,$acceso,$archivo["size"]
                  )

          );
        //Copiando archivo falta chequear el path segun lo indico William biblioDocs/_AREA_/_TIPO_
        if($r==1){
          $path=plugin_dir_path( __FILE__ )."../biblioDocs/_".normalize($darea[0])."_/_".normalize($dtipo[0])."_/";
           @copy($archivo["tmp_name"],$path.normalize($archivo["name"]));
          //subiendo imagen de portada  
          @copy($archivoPortada["tmp_name"],$path.normalize($archivoPortada["name"]));
          
        } 
  
  }else{
    echo"<div>
        <div class='alert alert-warning'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Ya existe una publicación para esta harramienta.</strong> 
          
        </div>
    </div>";
  }
 
}
$herramientas=$wpdb->get_results( 
    "select dgpc_herramienta.idherramienta, 
    dgpc_herramienta.nombre, 
    dgpc_componente.nombre as nombreComponente,
    dgpc_tipoherramienta.nombre as nombreTipo, 
    dgpc_claseherramienta.nombre as nombreClase,
    dgpc_publicacion.peso,
    dgpc_publicacion.fechaInicio,
    dgpc_publicacion.fechaFin,
    dgpc_publicacion.acceso,
    dgpc_publicacion.idpublicacion,
    dgpc_publicacion.archivo

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
 <div class='table-responsive'>
        <table class='table table-hover table-bordered' id='datosherramienta'>
          <thead>
          <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Componente</th>
            <th class="text-center">Tipo</th>
            <th class="text-center">Clase</th>
            <th class="text-center">Fecha inicio</th>
            <th class="text-center">Fecha fin</th>
            <th class="text-center">Peso</th>
            <th class="text-center">Acceso</th>
            <th class="text-center">Acciones</th>
            
          </tr>
          <thead>
          <tbody>
          <?php
            foreach ($herramientas as $h) {
              echo"
                 <tr>
                    <td>".$h->nombre."</td>
                    <td>".$h->nombreComponente."</td>
                    <td>".$h->nombreTipo."</td>
                    <td>".$h->nombreClase."</td>
                    <td class='text-center'>".$h->fechaInicio."</td>
                    <td class='text-center'>".$h->fechaFin."</td>
                    <td class='text-center'>".round(($h->peso)/(1024*1024),2)." MB</td>
                    <td class='text-center'>".$h->acceso."</td>
                    <td>
                      <button type='button' title='Publicar' class='btn btn-success btn-xs publich' name=publich id=publich value=".$h->idherramienta.">
                        <span class='glyphicon glyphicon-globe' data-toggle='tooltip' data-placement='top' title='Publicar'></span>
                      </button>
                      <button type='button' title='Borrar Publicación' class='btn btn-danger btn-xs borrarpub' name=borrarpub id=borrarpub value=".$h->idpublicacion.">
                        <span class='glyphicon glyphicon-eye-close' data-toggle='tooltip' data-placement='top' title='Borrar Publicación'></span>
                      </button>
                      <button type='button' title='Editar datos de herramienta' class='btn btn-success btn-xs borrarpub' name=editherramienta id=editherramienta value=".$h->idherramienta.">
                        <span class='glyphicon glyphicon-pencil' data-toggle='tooltip' data-placement='top' title='Editar datos de herramienta'></span>
                      </button>
                      <button type='button' title='Eliminar registro de Herramienta' class='btn btn-danger btn-xs borrarpub' name=borrarherramienta id=borrarherramienta value=".$h->idherramienta.">
                        <span class='glyphicon glyphicon-trash' data-toggle='tooltip' data-placement='top' title='Eliminar registro de Herramienta'></span>
                      </button>
                      
                    </td>
                  </tr>
              ";
            }
           ?>
     
        </tbody> 
        </table>
    </div>
 <div class="card pressthis">
  <p>Informacion que se considere necesaria ...... o derechos de autor de proteccion civil</p>
 </div>
</div>
  <!-- Modal DELPub -->
  <div class="modal fade" id="ModalDelPub" role="dialog"  tabindex="-1">
    <form role='form' name=fpubdel method=post>
      <div class="modal-dialog modal-sm" >
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title warning">¿Confirme que desea eliminar la publicación?</h4>
            <input type="hidden" name="delcodigopublicacion" id="delcodigopublicacion">
            
          </div>
          <div class="modal-body">
           <span class='glyphicon glyphicon-remove-circle'>
             Tenga presente que al eliminar una publicación unicamente se eliminaran los archivos: <b>contenido y portada</b><br>
             - El registro de la herramienta no es eliminado.
           </span>
          
          </div>
          <div class="modal-footer">
            <button type='submit' class='btn btn-success' name=delpublicacion value=ok>
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

 <!-- Modal ADD -->
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
                <label for=pubPortada>Imagen de portada</label>
                <input type=file id=pubPortada name=pubPortada required class='form-control' />  
            </div>    
            <div class='form-group'>
                <div class="col-md-4">
                <label for=pubInicio>Inicio de Publicación</label>
                </div>
                <div class="col-md-4">
                  <input type='text' required name="pubInicio" id='pubInicio' class='form-control date-picker' />  
                </div> 
            </div>
            
            <div class="clear"></div>
            <div class='form-group'>
              <div class="col-md-4">
                <label for=pubFin>Fin de Publicación</label>
              </div>
              <div class="col-md-4">
                <input type=text name=pubFin id=pubFin required class='form-control date-picker' />
              </div> 
            </div> 
            <div class="clear"></div> 
            <div class='form-group'>
                <label for=idioma>Acceso</label>
                <select name=acceso class='form-control'>
                  <option>Público</option>
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
  $('.borrarpub').click(function(){
    $("#ModalDelPub").modal();
    $("#delcodigopublicacion").val($(this).val());
   
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
$("#pubPortada").on("change",function(){
  var ext=['gif','jpg','jpeg','png'];
  var v=$("#pubPortada").val().split('.').pop().toLowerCase();
  var valido=false;
    for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==v)
            valido=true
    }
   if(valido==false){
    alert('Formato de portada no válido');
    $("#pubPortada").val('');
   } 

});
$('[data-toggle="tooltip"]').tooltip(); 
 $('#datosherramienta').DataTable();
 
</script>
