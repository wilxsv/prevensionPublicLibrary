<?php include('cabecera.php');

$tab="institucion";
if(isset($_POST["tab"])){
    $tab=$_POST["tab"];
}
echo "</br>
  <ul class='nav nav-tabs' role='tablist' id='myTabs'>
    <li role='presentation'>
    	<a href='#institucion' aria-controls='institucion' role='tab' data-toggle='tab'>
    	<span class='glyphicon glyphicon-search' aria-hidden='true'></span>Instituciones</a>
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
        <a href='#validacion' aria-controls='validacion' role='tab' data-toggle='tab'>Criterios de Validacion</a>
    </li>
    <li role='presentation'>
        <a href='#grupo' aria-controls='grupo' role='tab' data-toggle='tab'>Grupos Vulnerables</a>
    </li>
    <li role='presentation'>
        <a href='#incluye' aria-controls='incluye' role='tab' data-toggle='tab'>Campos de acción</a>
    </li>
    <li role='presentation'>
        <a href='#pregunta' aria-controls='pregunta' role='tab' data-toggle='tab'>Aplicabilidad ¿Cómo?</a>
    </li>
    <li role='presentation'>
        <a href='#contacto' aria-controls='contacto' role='tab' data-toggle='tab'>Contactos</a>
    </li>
  </ul>
<div class='tab-content'>";
include('institucion.php');
include('area.php');
include('componente.php');  
include('tipo.php'); 
include('clase.php'); 
include('ambito.php'); 
include('validacion.php'); 
include('grupo.php'); 
include('incluye.php'); 
include('pregunta.php'); 
include('contacto.php'); 
?>
</div>