<?php
 wp_enqueue_script('jquery-ui-datepicker');
 wp_enqueue_script('jquery-ui');//
 wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/ui-lightness/jquery-ui.css');
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
  </ul>
  <div id="tabs-1">
    <p></p>
  </div>
  <div id="tabs-2">
    <p></p>
  </div>
  <div id="tabs-3">
    <p></p>
  </div>
 </div>
</div>
