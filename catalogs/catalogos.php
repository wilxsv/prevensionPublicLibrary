<?php include('cabecera.php');

$tab="institucion";
if(isset($_POST["tab"])){
    $tab=$_POST["tab"];
}
echo "</br>
  <ul class='nav nav-tabs' role='tablist' id='myTabs'>
    <li role='presentation'>
    	<a href='#institucion' aria-controls='institucion' role='tab' data-toggle='tab'>
    	<span class='glyphicon glyphicon-search' aria-hidden='true'></span>Institución</a>
    </li>
    <li role='presentation'>
    	<a href='#area' aria-controls='area' role='tab' data-toggle='tab'>Areas</a>
    </li>
    <li role='presentation'>
    	<a href='#componente' aria-controls='componente' role='tab' data-toggle='tab'>Componentes</a>
    </li>
    <li role='presentation'>
    	<a href='#tipo' aria-controls='tipo' role='tab' data-toggle='tab'>Tipo de Herramienta</a>
    </li>
    <li role='presentation'>
    	<a href='#clase' aria-controls='clase' role='tab' data-toggle='tab'>Clase de Herramienta</a>
    </li>
    <li role='presentation'>
    	<a href='#ambito' aria-controls='ambito' role='tab' data-toggle='tab'>Ámbitos de aplicación</a>
    </li>
     <li role='presentation'>
        <a href='#pregunta' aria-controls='pregunta' role='tab' data-toggle='tab'>Preguntas ¿Cómo?</a>
    </li>
  </ul>
<div class='tab-content'>";
include('institucion.php');
include('area.php');
include('componente.php');  
include('tipo.php'); 
include('clase.php'); 
include('ambito.php'); 
include('pregunta.php'); 
?>
</div>