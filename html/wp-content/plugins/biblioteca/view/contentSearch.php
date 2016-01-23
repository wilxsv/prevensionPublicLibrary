<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script>

function func()
 {
    //make the ajax call
    $.ajax({
        url: '<?php echo get_site_url().'/wp-content/plugins/biblioteca/control/'; ?>buscaPor.php',
        type: 'POST',
        data: {institucion : $( "#idinstitucionelaboro" ).val(),
			grupo :  $( "#grupo" ).val(),
			tipo :  $( "#tipo" ).val(),
			clase :  $( "#clase" ).val(),
			ambito :  $( "#ambito" ).val(),
			componente :  $( "#componente" ).val(),
			<?php
			$z=1;
			$opcionesComp=array();
			$query = "SELECT * FROM dgpc_area;";
		    $areas=$wpdb->get_results($query);
			foreach ($areas as $reg) {
 			 echo 'componente'.$z.' : $( "#componente'.$z.'" ).val(),';
 			}
			?>
			
			},
        success: function(result) {
            console.log("Data sent!");
            $('#resultado').html(result);
        }
    });
}
</script>
<form id="formulario">
 <div class="tabs style-top-tab">
  <div class="tab-titles hidden-xs clearfix">
   <a data-tab-id="1" class="tab-title header-font tab-id-1 active" href="#tabpanel1">Generales</a>
   <a data-tab-id="2" class="tab-title header-font tab-id-2" href="#tabpanel2">Componente</a>
   <a data-tab-id="3" class="tab-title header-font tab-id-3" href="#tabpanel3">Clasificación y ambito</a>
   <a data-tab-id="4" class="tab-title header-font tab-id-4" href="#tabpanel4">Por territorio</a>
  </div>
  <div class="tab-content" id="tabpanel1" style="display: block;"><div class='table-responsive'><?php require "forms/general.php"; ?></div></div>
  <div class="tab-content" id="tabpanel2" style="display: none;"><div class='table-responsive'><?php require "forms/componente.php"; ?></div></div>
  <div class="tab-content" id="tabpanel3" style="display: none;"><div class='table-responsive'><?php require "forms/clacificacion.php"; ?></div></div>
  <div class="tab-content" id="tabpanel4" style="display: none;"><div class='table-responsive'><?php require "forms/territorio.php"; ?></div></div>
  <div class="clearfix"></div>
 </div>
</form>
<div id="resultado">
 <?php
  include include WP_PLUGIN_DIR."/biblioteca/control/buscaPorHerramienta.php";  
 ?>
</div>
<!--

<div class="parametrosDiv"></div>
 wp_enqueue_script('jquery-ui-datepicker');
 wp_enqueue_script('jquery-ui');//
 wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/ui-lightness/jquery-ui.css');
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

<a href="#" class="show_hide">
	<?php echo '<img src="'.get_site_url().'/wp-content/plugins/biblioteca/view/img/document_search.png" alt="Buscar herramienta" height="64" width="64" />'; ?>Buscar herramienta
</a>
!>
