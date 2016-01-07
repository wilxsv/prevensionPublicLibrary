<?php
 wp_enqueue_script('jquery-ui-datepicker');
 wp_enqueue_script('jquery-ui');//
 wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/ui-lightness/jquery-ui.css');
 global $wpdb;
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
<script type="text/javascript">
 $(document).ready(function(){
  $(".parametrosDiv").hide();
  $(".show_hide").show();
  $('.show_hide').click(function(){
   $(".parametrosDiv").slideToggle();
  });
 });
 $(function() {
    $( "#tabs" ).tabs();
  }); 
</script>

<a href="#" class="show_hide">Buscar herramienta</a><br />
<div class="parametrosDiv">
 <div id="tabs">
  <ul>
    <li><a href="#tabs-1"><span class="breadcrumb-current">Generales</span></a></li>
    <li><a href="#tabs-2">Componente</a></li>
    <li><a href="#tabs-3">Clasificación y ambito</a></li>
    <li><a href="#tabs-4">Por territorio</a></li>
  </ul>
  <div id="tabs-1">
   <div class='table-responsive'>
	<?php require "forms/general.php"; ?>
   </div>
  </div>
  <div id="tabs-2">
   <div class='table-responsive'>
	<?php require "forms/componente.php"; ?>
   </div>
  </div>
  <div id="tabs-3">
   <div class='table-responsive'>
	<?php require "forms/clacificacion.php"; ?>
   </div>
  </div>
  <div id="tabs-4">
   <div class='table-responsive'>
    <?php require "forms/territorio.php"; ?>
   </div>
  </div>
 </div>
</div>
<script type="text/javascript">
var selectActivo='';
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
 changeMonth: true,
 changeYear: true, 
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
    $(".date-picker").datepicker();

//funcion ajax
    $('#addinstitucion').on('click', function(){
        $('#ModalAdd').modal();
        selectActivo=1;

      });
    $('#addinstitucion2').on('click', function(){
    $('#ModalAdd').modal();
      selectActivo=2;
      });
        
    $('#saveinstitucion').on('click', function(){
        registrarInstitucion();
         $('#ModalAdd').modal('hide');

    });   
  function getInstituciones(nombreIns,selectName){

  $.post( 'admin-ajax.php', {action: 'get_instituciones'}, function(data)
        {
          var q = data.length;
          
            if ( q > 0 ) {
               
                $(selectName).html('');
              for ( var i = 0; i < q; i++ )
                {
                 
                  if(selectName!=null){
                      if(nombreIns==data[i].nombre){
                           $(selectName).append("<option selected value="+data[i].value+">"+data[i].nombre+"</option>");
                      }else{
                           $(selectName).append("<option value="+data[i].value+">"+data[i].nombre+"</option>");
                      }
                  }
                }
            } 
        }, 'json');
  }

  function registrarInstitucion(){
      $.post( 'admin-ajax.php', {action: 'insert_institucion',nombre: $('#nombreinstitucion').val()}, function(data)
        {
          var q = data.length;
            if ( q > 0 ) {
              if(selectActivo==1){
               getInstituciones($('#nombreinstitucion').val(),'#idinstitucionelaboro');
              }else{
               getInstituciones($('#nombreinstitucion').val(),'#institucionpresenta');
              }
              
            } 
        }, 'json');
  }    
  
  getInstituciones(null,'#idinstitucionelaboro');
  getInstituciones(null,'#institucionpresenta');
});
</script>
