<?php
/*
Plugin Name: Biblioteca Virtual
Description: Administración de Herramientas virtuales para DGPC.
Author: Daniel Sorto
Version: 0.1
*/
add_action('admin_menu', 'setup_menu');

function setup_menu(){

	require('setupMenu.php'); 
	require('load.php');     
}
 
function FormHerramientas(){
	require('/catalogs/formularioHerramienta.php');
}
function loadArea(){
	require('area.php');
} 
function parametros(){

	include('/catalogs/catalogos.php');
}
?>